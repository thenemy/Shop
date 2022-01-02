<?php

namespace App\Domain\SchemaSms\Interfaces;

interface   SchemaSmsType
{
    const REMAINDER_PAYMENT = 1;
    const DAY_OF_PAYMENT = 2;
    const EXPIRED_PAYMENT = 3;
    const AFTER_PAYMENT = 4;


    const TYPE_NAME = 0;
    const TYPE_NUMBER_ORDER = 1;

}
