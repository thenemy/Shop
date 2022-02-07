<?php

namespace App\Domain\Product\ProductKey\Front\Dynamic;

use App\Domain\Core\Front\Admin\CustomTable\Traits\TableDynamic;
use App\Domain\Product\ProductKey\Services\ProductValueService;

class ProductValueDynamic extends ProductValueDynamicWithoutEntity
{
    use TableDynamic;

    public static function getBaseService(): string
    {
        return ProductValueService::class;
    }

    public static function getDynamicParentKey(): string
    {
        return  "product_key_id";
    }
}
