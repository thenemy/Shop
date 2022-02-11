<?php

namespace App\Domain\Order\Traits;

use App\Domain\Order\Interfaces\UserPurchaseRelation;

trait UserPurchaseStatus
{
    public function isDelivery()
    {
        $status = $this->status % 100;
        $rest = $this->status % 10;
        $delivery = $status - $rest;
        return $delivery == UserPurchaseRelation::DELIVERY;
    }
}
