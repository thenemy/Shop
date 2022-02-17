<?php

namespace App\Domain\Common\Colors\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class ColorsBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "color";
    }

    public function joinColorProducts()
    {
        return $this->join(
            "color_products",
            "color_products.color_id",
            "=",
            "colors.id")
            ->select("colors.*");
    }

    public function joinProduct()
    {
        return $this->joinColorProducts()->join(
            "products",
            "products.id",
            "=",
            "color_products.product_id");
    }

    public function byCategory($category_id)
    {
        return $this->joinProduct()->where("products.category_id", "=", $category_id);
    }
}
