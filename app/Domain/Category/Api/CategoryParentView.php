<?php

namespace App\Domain\Category\Api;

use App\Domain\Category\Entities\Category;
use App\Domain\Product\Api\ProductCard;
use App\Domain\Product\Product\Entities\Product;
use App\Http\Controllers\Api\Interfaces\ApiControllerInterface;

// Category Page of first parent
// this will be result of parent`s children
class CategoryParentView extends Category
{
    public function childsCategory()
    {
        return $this->hasMany(CategoryChild::class, "parent_id");
    }

    public function products()
    {
        return $this->hasMany(ProductCard::class);
    }

    public function toArray()
    {
        if ($this->childsCategory()->exists()) {
            $children = $this->childsCategory->toArray();
            return [
                'name' => $this->getNameCurrentAttribute(),
                "slug" => $this->slug,
                "children" => $children,
                "products" => $children[0]->products()->take(ApiControllerInterface::BIG_PAGINATE)->get()
            ];
        }
        return [
            'name' => $this->getNameCurrentAttribute(),
            "slug" => $this->slug,
            "products" => $this->products()->take(ApiControllerInterface::BIG_PAGINATE)->get()
        ];
    }
}
