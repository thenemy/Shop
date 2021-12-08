<?php

namespace App\Domain\Delivery\Api\Models;

use App\Domain\Delivery\Api\Base\DpdClient;
use App\Domain\Delivery\Entities\DeliveryAddress;
use Ramsey\Collection\Collection;

class DpdCalculator extends DpdClient
{
    public function getCost(DeliveryAddress $pickUp, DeliveryAddress $delivery, Collection $products)
    {
        /**
         * calculate the products weight
         */
        $request = [
            "pickup" => [

            ],
            'delivery' => [

            ]
        ];
        $request = array_merge($request, $this->auth);
        $reponse = $this->client->getServiceCost2($request);
        /***
         * check the status of the response
         */
    }
}
