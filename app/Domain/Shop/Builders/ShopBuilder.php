<?php

namespace App\Domain\Shop\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class ShopBuilder extends BuilderEntity
{
    public function getSearch(): string
    {
        return "name";
    }

    public function joinProduct()
    {
        return $this->join("products", "products.shop_id",
            "=",
            "shops.id");
    }

    public function byCategory($category_id)
    {
        return $this->joinProduct()->where("products.category_id", $category_id);
    }
}
