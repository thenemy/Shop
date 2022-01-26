<?php

namespace App\Domain\Installment\Interfaces;

interface PurchaseStatus
{
    const WAIT_ANSWER = 0;
    const ACCEPTED = 1;
    const DECLINED = 2;
    const REQUIRED_SURETY = 10; // surety not equal to null
    const FINISHED = 3;
    const NOT_PAID = -1;
}
