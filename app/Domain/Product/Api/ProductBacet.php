<?php

namespace App\Domain\Product\Api;

use App\Domain\Product\Product\Entities\Product;

class ProductBacet extends Product
{
    public function toArray()
    {

        return [
            "title" => $this->title,
            "price" => $this->price,
            "real_price" => $this->real_price
        ];
    }
}
