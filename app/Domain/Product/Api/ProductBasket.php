<?php

namespace App\Domain\Product\Api;

use App\Domain\Product\Product\Entities\Product;
use App\Domain\Shop\Api\ShopBasket;

class ProductBasket extends Product
{
    public function shop()
    {
        return $this->belongsTo(ShopBasket::class, "shop_id");
    }

    public function toArray()
    {
        return [
            "image" => $this->productImageHeader->image->fullPath(),
            "title" => $this->title_current,
            "price" => $this->productLogic->getPriceCurrency(),
            "real_price" => $this->real_price,
            "discount_price" => $this->productLogic->getPriceCurrency() - $this->real_price
        ];
    }
}
