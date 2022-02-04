<?php

namespace App\Domain\Product\ProductKey\Entities;

use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Product\ProductKey\Builders\ProductValueBuilder;
use App\Domain\Product\ProductKey\Traits\TextTranslation;
use App\Domain\ProductKey\Entities\Key;

class ProductValue extends Entity
{
    use TextTranslation;

    protected $guarded = null;
    protected $table = 'product_values';
    protected $fillable = [
        "text",
        "text_ru",
        "text_uz",
        "text_en",
        'product_key_id'
    ];

    public function newEloquentBuilder($query): ProductValueBuilder
    {
        return new ProductValueBuilder($query);
    }

}

