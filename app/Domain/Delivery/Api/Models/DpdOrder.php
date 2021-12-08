<?php

namespace App\Domain\Delivery\Api\Models;

use App\Domain\Delivery\Api\Base\DpdClient;
use App\Domain\Delivery\Entities\Delivery;
use App\Domain\Shop\Entities\ShopAddress;

class DpdOrder extends DpdClient
{
    /**
     * @return  Delivery
     */
    public function createOrder(ShopAddress $fromAddress)
    {
        $request = [
            'header' => [

            ]
        ];
    }

    public function getOrderStatus()
    {

    }

    private function getDatePickUp(ShopAddress $address)
    {
        /**
         * check the shop`s nearest working day using day
         * in workTime method
         */
    }
}
