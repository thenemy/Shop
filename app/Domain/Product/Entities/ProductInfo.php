<?php


namespace App\Domain\Product\Entities;


use App\Domain\Core\Main\Entities\Entity;

class ProductInfo extends Entity
{
    public function productInfo(){
        return $this->belongsTo(Product::class);
    }
}
