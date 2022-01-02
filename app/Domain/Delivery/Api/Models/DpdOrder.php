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
    const ORDER = "order2?wsdl";

    public function __construct()
    {
        parent::__construct(self::ORDER);
    }

    public function createOrder(ShopAddress $fromAddress)
    {
        $request = [
            'header' => [
                'datePickup' => $fromAddress->workTime()->where("day", ">=", date('w'))->orderByDesc("day")
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
