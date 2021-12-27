<?php

namespace App\Domain\Order\Interfaces;

interface UserPurchaseRelation
{
    const PURCHASE_SERVICE = "purchases";
    const PURCHASE_TO = self::PURCHASE_SERVICE . \CR::CR;
    const PRODUCTS_ENCODE = "products_encoded";
}
