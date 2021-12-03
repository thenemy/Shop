<?php

namespace App\Domain\Product\Product\Interfaces;

interface ProductInterface
{
    const CURRENCY_USD_DB = 0;
    const CURRENCY_UZS_DB = 1;
    const CURRENCY_USD_TEXT = "USD";
    const CURRENCY_UZS_TEXT = "UZS";
    const DB_TO_TEXT = [
        self::CURRENCY_USD_DB => self::CURRENCY_USD_TEXT,
        self::CURRENCY_UZS_DB => self::CURRENCY_UZS_TEXT
    ];
    const TEXT_TO_DB = [
        self::CURRENCY_UZS_TEXT => self::CURRENCY_UZS_DB,
        self::CURRENCY_USD_TEXT => self::CURRENCY_USD_DB
    ];



}

