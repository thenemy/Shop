<?php

namespace App\Domain\Category\Front\Dynamic;

use App\Domain\Category\Services\FiltrationKeyCategoryService;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts\DynamicAttributes;
use App\Domain\Core\Front\Admin\CustomTable\Traits\TableDynamic;

class FiltrationKeyCategoryDynamic extends FiltrationKeyCategoryDynamicWithoutEntity
{
    use TableDynamic;

    public static function getCustomRules(): array
    {
        return [
            'key_ru' => DynamicAttributes::INPUT,
            "key_uz" => DynamicAttributes::INPUT,
            "key_en" => DynamicAttributes::INPUT,
        ];
    }

    public function getCustomFrontRules(): array
    {
        return [
            'key_ru' => null,
            "key_uz" => null,
            "key_en" => null,
        ];
    }
    public static function getBaseService(): string
    {
        return FiltrationKeyCategoryService::class;
    }

    public static function getDynamicParentKey(): string
    {
        return  "category_id";
    }
}
