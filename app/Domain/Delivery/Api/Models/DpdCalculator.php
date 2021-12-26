<?php

namespace App\Domain\Delivery\Api\Models;

use App\Domain\Delivery\Api\Base\DpdClient;
use App\Domain\Delivery\Entities\DeliveryAddress;
use Illuminate\Support\Collection;

class DpdCalculator extends DpdClient
{
    const CALCULATOR = "calculator2?wsdl";

    public function __construct()
    {
        parent::__construct(self::CALCULATOR);
    }

    private function getDelivery(DeliveryAddress $address): array
    {
        $response = [
            'cityId' => $address->availableCities->cityId,
            'cityName' => $address->availableCities->cityName,
            'regionCode' => $address->availableCities->regionCode,
            'countryCode ' => $address->availableCities->countryCode
        ];
        if ($address->index) {
            $response['index'] = $address->index;
        }
        return $response;
    }

    private function setWeightAndServiceCode(Collection $product, int &$weight)
    {
        $partial = true;
        $weight = $product->reduce(function ($cary, $item) {
            $partial = $item->weight <= 30;
            return $cary + $item->weight;
        });
        return $partial ? "" : "";
    }

    public function getCost(DeliveryAddress $pickUp, DeliveryAddress $delivery, Collection $products)
    {
        /**
         * calculate the products weight
         */

        $weight = 0;
        $this->setWeightAndServiceCode($products, $weight);
        $request = [
            "pickup" => $this->getDelivery($pickUp),
            'delivery' => $this->getDelivery($delivery),
            'selfPickup' => false,
            "selfDelivery" => false,
            "weight" => $weight,
        ];
        $request = ["request" => array_merge($request, $this->auth)];

        $reponse = $this->client->getServiceCost2($request);
        /***
         * check the status of the response
         */
        return $reponse['return'];
    }
}
