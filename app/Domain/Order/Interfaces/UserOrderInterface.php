<?php

namespace App\Domain\Order\Interfaces;

interface UserOrderInterface
{
    const CASH = 1;
    const INSTANCE_PAYMENT = 10;
    const INSTALMENT = 100;
    const DELIVERY = 1000;
    const SELF_DELIVERY = 10000;
    const CASH_AND_SELF_DELIVERY = self::CASH + self::SELF_DELIVERY;
    const INSTANCE_PAYMENT_AND_SELF_DELIVERY = self::INSTANCE_PAYMENT + self::SELF_DELIVERY;
    const INSTALMENT_AND_SELF_DELIVERY = self::INSTALMENT + self::SELF_DELIVERY;
    const CASH_AND_DELIVERY = self::CASH + self::DELIVERY;
    const INSTANCE_PAYMENT_AND_DELIVERY = self::INSTANCE_PAYMENT + self::DELIVERY;
    const INSTALMENT_AND_DELIVERY = self::INSTALMENT + self::DELIVERY;
}
