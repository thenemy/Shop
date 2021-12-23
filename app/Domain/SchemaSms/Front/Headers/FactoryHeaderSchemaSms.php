<?php

namespace App\Domain\SchemaSms\Front\Headers;

use App\Domain\SchemaSms\Front\Values\ValueHeader;
use App\Domain\SchemaSms\Interfaces\SchemaSmsType;

class FactoryHeaderSchemaSms implements SchemaSmsType
{
    static public function installment()
    {
        return [
            self::REMAINDER_PAYMENT => new HeaderSchemaSms(__("Напоминание об оплате"),
                self::REMAINDER_PAYMENT, [
                    new ValueHeader("Ф.И.О", '${name}'),
                ]),
            self::DAY_OF_PAYMENT => new HeaderSchemaSms(__("Наступил день оплаты"),
                self::DAY_OF_PAYMENT, [
                    new ValueHeader("Ф.И.О", '${name}'),
                ]),
            self::EXPIRED_PAYMENT => new  HeaderSchemaSms(__("Просроченный платеж"),
                self::EXPIRED_PAYMENT, [
                    new ValueHeader("Ф.И.О", '${name}'),
                ]),
            self::AFTER_PAYMENT => new HeaderSchemaSms(__("Оплаченный платеж"),
                self::AFTER_PAYMENT, [
                    new ValueHeader("Ф.И.О", '${name}'),
                ])
        ];
    }
}
