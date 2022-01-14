<?php

namespace App\Domain\Delivery\Api\Models;

use App\Domain\Category\Entities\Category;
use App\Domain\Delivery\Api\Base\DpdClient;
use App\Domain\Delivery\Api\Exceptions\DpdException;
use App\Domain\Delivery\Api\Traits\OrderTrait;
use App\Domain\Delivery\Entities\Delivery;
use App\Domain\Delivery\Entities\DeliveryAddress;
use App\Domain\Order\Entities\UserPurchase;
use App\Domain\Shop\Entities\ShopAddress;
use App\Domain\Shop\Entities\WorkTimes;
use Illuminate\Support\Collection;

// create one field in category boolean weather all products in this category is considered as important
// .Then, loop over the products and if there is the product which belongs to category having important mark
//  make cargoRegistered as important

// if workTimes is not exists throw exception

// decide how to make serviceCode and this is ready

// check how it is works
class DpdOrder extends DpdClient
{
    use OrderTrait;

    /**
     * @return  Delivery
     */
    const NUM_DAYS_WEEK = 7;
    const ORDER = "order2?wsdl";

    public function __construct()
    {
        parent::__construct(self::ORDER);
    }

    private function checkOnError(array $response)
    {
        if (($status = $response['status']) != DpdException::OK) {
            if (isset(DpdException::EXCEPTION[$status])) {
                throw  new DpdException(__(DpdException::EXCEPTION[$status]));
            } else
                throw new DpdException($response['errorMessage']);

        }
    }

    // delivery will be created after this method
    public function createOrder(ShopAddress $fromAddress, DeliveryAddress $toAddress, $purchase_number, Collection $purchases)
    {
        $categories = $this->purchaseToCategory($purchases);
        $dateAndWorkTime = $this->calculateDatePickUp($fromAddress->workTime()->orderBy("day")->get());
        $request = [
            'header' => [
                'datePickup' => $dateAndWorkTime[0],
                'senderAddress' => $this->generateSenderAddress($dateAndWorkTime[1], $fromAddress),
                'pickupTimePeriod' => "9-18",
            ],
            'order' => [
                'orderNumberInternal' => $this->orderNumberInternal($purchase_number, $fromAddress),
                'serviceCode' => "PLC",
                'serviceVariant' => "ДД",
                "cargoNumPack" => $purchases->sum("quantity"),
                'cargoWeight' => $this->calculateWeight($purchases),
                "cargoRegistered" => $this->categoriesIsRegistered($categories),
                "cargoCategory" => $categories->map(function ($item) {
                    return $item->name['ru'];
                })->join(', '),
                "receiverAddress" => $toAddress->toArray(),
                "returnAddress" => $fromAddress->delivery->toArray(),
                'extraParam' => [
                    'pickup_city_id' => $fromAddress->delivery->availableCities->city_id,
                    'deliver_city_id' => $toAddress->availableCities->city_id
                ],
            ]
        ];
        $response = $this->callSoapMethod($request, "orders", "createOrders");
        $this->checkOnError($response);
        return $response;
    }

    public function getOrderStatus(Delivery $delivery)
    {
        $request = [
            'order' => [
                'orderNumberInternal' => $this->orderNumberInternal($delivery->shop_id, $delivery->user_purchase_id),
                'datePickup' => $delivery->datePickup,
            ]
        ];
        $response = $this->callSoapMethod($request, "orderStatus", "getOrderStatus");
        $this->checkOnError($response);
        return $response;
    }

    public function cancelOrder(Delivery $delivery)
    {
        $request = [
            "cancel" => [
                "orderNumberInternal" => $this->orderNumberInternal($delivery->shop_id, $delivery->user_purchase_id),
                'orderNum' => $delivery->orderNum,
                "pickupdate" => $delivery->datePickup
            ]
        ];
        $response = $this->callSoapMethod($request, "orders", "cancelOrder");
        $this->checkOnError($response);
        return $response;
    }
}
