<?php

namespace App\Domain\Delivery\Api\Services;

use App\Domain\Delivery\Api\Models\DpdOrder;
// write the service
class OrderService
{
    private DpdOrder $dpdOrder;

    public function __construct()
    {
        $this->dpdOrder = new DpdOrder();
    }


}
