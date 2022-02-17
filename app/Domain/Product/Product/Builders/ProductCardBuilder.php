<?php

namespace App\Domain\Product\Product\Builders;

class ProductCardBuilder extends ProductBuilder
{
    public function joinInfo()
    {
        return $this->join("product_infos", "product_infos.id",
            "=",
            "products.id");
    }

    public function onlyPopular()
    {
        return $this->joinInfo()->orderBy("product_infos.views_num", "DESC");
    }

    public function byCategory($category_id)
    {
        return $this->where("category_id", "=", $category_id);
    }

    public function disInCategory($category_id)
    {
        return $this->byCategory($category_id)
            ->joinDiscountFull()
            ->orderBy("discounts.percent", "DESC");
    }

    public function popInCategory($category_id)
    {
        return $this->byCategory($category_id)->onlyPopular();
    }
}
