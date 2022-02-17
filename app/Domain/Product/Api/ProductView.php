<?php

namespace App\Domain\Product\Api;

use App\Domain\Product\Color\Api\ProductMainColorApi;
use App\Domain\Product\Color\Api\ProductManyColorApi;
use App\Domain\Product\Color\Entities\ProductMainColor;
use App\Domain\Product\HeaderText\Api\HeaderTextApi;
use App\Domain\Product\HeaderText\Entities\HeaderText;
use App\Domain\Product\HeaderText\Pivot\HeaderProduct;
use App\Domain\Product\Images\Api\ImageApi;
use App\Domain\Product\Product\Entities\ProductDescription;
use App\Domain\Product\ProductKey\Api\ProductKeyApi;
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

    public function productKey(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(ProductKeyApi::class,
            'product_keys_product',
            'product_id',
            'products_key_id')->using(ProductKeyProducts::class)->withPivot("id");
    }

    public function description(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ProductDescriptionApi::class, "product_id");
    }

    public function headerText()
    {
        return $this->belongsToMany(HeaderTextApi::class,
            "header_product",
            "product_id",
            'header_text_id'
        )->using(HeaderProduct::class)->withPivot(["id"]);
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
