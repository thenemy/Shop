<?php

namespace App\Domain\Order\Interfaces;

interface UserOrderInterface
{
    const CASH = 1;
    const INSTANCE_PAYMENT = 10;
    const INSTALMENT = 100;

}
