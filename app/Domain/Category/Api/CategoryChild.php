<?php

namespace App\Domain\Category\Api;

use App\Domain\Category\Entities\Category;
use App\Domain\Product\Api\ProductCard;

class CategoryChild extends Category
{
        public function products()
        {
            return $this->hasMany(ProductCard::class);
        }
    public function toArray()
    {
        return [
            'name' => $this->getNameCurrentAttribute(),
            "slug" => $this->slug,
        ];
    }
}
