<?php

namespace App\Domain\Product\Product\Entities;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Traits\CheckedAttribute;
use App\Domain\Product\Api\ProductCard;
use App\Domain\Product\Product\Jobs\ProductOfDayJob;

class ProductOfDay extends Entity
{
    use CheckedAttribute;

    protected static function booting()
    {
        self::creating(function ($product) {
            $product->start_time = now();
            $product->end_time = now()->addHours(24);
            ProductOfDayJob::dispatch($product->product);
        });
    }

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ProductCard::class, 'product_id');
    }

    public function toArray()
    {
        return $this->product->toArray();
    }
}
