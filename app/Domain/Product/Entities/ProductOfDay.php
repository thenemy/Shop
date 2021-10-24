<?php


namespace App\Domain\Product\Entities;


use App\Domain\Core\Main\Entities\Entity;

class ProductOfDay extends Entity
{
    public function productOfDay(){
        return $this->belongsToMany(Product);
    }
}
