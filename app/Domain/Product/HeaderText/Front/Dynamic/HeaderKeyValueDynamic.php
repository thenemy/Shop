<?php

namespace App\Domain\Product\HeaderText\Front\Dynamic;

use App\Domain\Core\Front\Admin\CustomTable\Traits\TableDynamic;
use App\Domain\Product\HeaderText\Services\HeaderKeyValueService;

class HeaderKeyValueDynamic extends HeaderKeyValueDynamicWithoutEntity
{
    use TableDynamic;

    public static function getBaseService(): string
    {
        return HeaderKeyValueService::class;
    }

    public static function getDynamicParentKey(): string
    {
        return "header_product_id";
    }
}
