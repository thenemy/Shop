<?php

namespace App\Domain\Order\Traits;

use App\Domain\Order\Interfaces\UserPurchaseRelation;

trait UserPurchaseStatus
{

    private function getPayment()
    {
        return $this->status % 1000 - $this->status % 100;
    }

    public function isInstallment()
    {
        return $this->getPayment() == self::INSTALMENT - 1;
    }

    public function isInstansPayment()
    {
        return $this->getPayment() == self::INSTANCE_PAYMENT;
    }
    public function isDelivery()
    {
        $status = $this->status % 100;
        $rest = $this->status % 10;
        $delivery = $status - $rest;
        return $delivery == UserPurchaseRelation::DELIVERY;
    }
}
