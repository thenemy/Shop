<?php

namespace App\Domain\Product\Api;

use App\Domain\Product\Color\Api\ProductMainColorApi;
use App\Domain\Product\Color\Api\ProductManyColorApi;
use App\Domain\Product\Color\Entities\ProductMainColor;
use App\Domain\Product\Images\Api\ImageApi;
use App\Domain\Product\ProductKey\Entities\ProductKey;
use App\Domain\Product\ProductKey\Pivot\ProductKeyProducts;
use App\Domain\Shop\Api\ShopCard;
use App\Domain\Shop\Api\ShopInFilter;


// do you need data from card?
class ProductView extends ProductCard
{
    public function productImage(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ImageApi::class, 'product_id');
    }

    public function colors()
    {
        return $this->hasMany(ProductMainColorApi::class, "product_id");
    }


    public function shop()
    {
        return $this->belongsTo(ShopInFilter::class, "shop_id");
    }

    public function toArray()
    {
        return [
            "images" => $this->productImage->toArray(),
            "colors" => $this->colors->toArray(),
            "shop" => $this->shop->toArray(),
            "key_with_values" => $this->productKey->toArray(),
            "about_product" => $this->description->toArray(),
            "characteristics" => $this->headerText->toArray(),
        ];
    }
}
