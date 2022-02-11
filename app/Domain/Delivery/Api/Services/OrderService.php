<?php

namespace App\Domain\Delivery\Api\Services;

use App\Domain\Delivery\Api\Exceptions\DpdException;
use App\Domain\Delivery\Api\Models\DpdCalculator;
use App\Domain\Delivery\Api\Models\DpdOrder;
use App\Domain\Delivery\Entities\Delivery;
use App\Domain\Delivery\Entities\DeliveryAddress;
use App\Domain\Delivery\Services\DeliveryService;
use App\Domain\Order\Entities\Order;
use App\Domain\Order\Entities\Purchase;
use App\Domain\Order\Entities\UserPurchase;
use App\Domain\Order\Interfaces\UserPurchaseStatus;
use App\Domain\Shop\Entities\Shop;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

// write the service
class OrderService
{
    private DpdOrder $dpdOrder;
    private DpdCalculator $dpdCalculator;
    private DeliveryService $service;

    public function __construct()
    {
        $this->dpdOrder = new DpdOrder();
        $this->dpdCalculator = new DpdCalculator();
        $this->service = new DeliveryService();
    }


    /**
     * @param Collection<Order> $orders
     * @param DeliveryAddress $address -- server must send data about delivery
     * just create eloquent without saving it in DATABASE
     * @return array price and days
     */
    /**
     *  first orders got than it transforms to purchases
     */
    public function calculatePrice(Collection $orders, DeliveryAddress $address): array
    {
        // transforming order is required for getting shop_id and weight
        // can be easily rewritten to improve performance using JOIN
        $products = $orders->transform(function (Order $item) {
            $item->shop_id = $item->product->shop_id;
            $item->weight = $item->product->weight * $item->quantity;
            return $item;
        })->groupBy("shop_id");
        $price = 0;
        $day = 0;
        try {
            DB::beginTransaction();
            foreach ($products as $shop_id => $order) {
                $response = $this->dpdCalculator->getCost(
                    Shop::find($shop_id)->shopAddress->delivery,
                    $address,
                    $order
                );
                $delivery = $response[0];
                $order->order = ['delivery' => $delivery];
                $order->save();
                $price = $delivery['price'] + $price;
                $day = $day + $delivery['days'];
            }
            DB::commit();
            return ['price' => $price, 'days' => $day];
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }

    }

    public function createOrder(UserPurchase $userPurchase)
    {
        try {
            $deliveryTo = $userPurchase->delivery_address;
            $shop_purchases = Purchase::byUserPurchaseWithShopId($userPurchase->id)->get()->groupBy("shop_id");
            DB::beginTransaction();
            foreach ($shop_purchases as $shop_id => $purchase) {
                try {
                    $shop_address = Shop::find($shop_id)->shopAddress;
                    $response = $this->dpdOrder->createOrder(
                        $shop_address,
                        $deliveryTo,
                        $userPurchase,
                        $purchase);
                    $this->service->create([
                        "user_purchase_id" => $userPurchase->id,
                        "shop_address_id" => $shop_address->id,
                        'orderNum' => $response['orderNum'][0],
                        "status" => $response['status'],
                        "datePickup" => $response['datePickup']
                    ]);
                } catch (DpdException $exception) {
                    $all = $userPurchase->delivery;
                    foreach ($all as $item) {
                        try {
                            $this->dpdOrder->cancelOrder($item);
                        } catch (DpdException $exception) {
                        }
                    }
                    throw  $exception;
                }
            }
            DB::commit();
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw  $exception;
        }
    }

    public function cancelOrder(Delivery $delivery)
    {
        $this->dpdOrder->cancelOrder($delivery);
    }

}
