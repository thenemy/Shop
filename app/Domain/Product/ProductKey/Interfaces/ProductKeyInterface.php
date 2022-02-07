<?php

namespace App\Domain\Product\ProductKey\Interfaces;

interface ProductKeyInterface
{
    const FILTRATION = "filtration";
    const PRODUCT = "product";
    const VALUE = "value";
    const PRODUCT_TO = self::PRODUCT . \CR::CR;
    const VALUE_TO = self::PRODUCT . \CR::CR . self::VALUE;
}
