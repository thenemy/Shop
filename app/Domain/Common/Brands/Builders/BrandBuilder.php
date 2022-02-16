<?php

namespace App\Domain\Common\Brands\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class BrandBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "brand";
    }

    public function joinInfo()
    {
        return $this->join("brand_infos",
            "brand_infos.id",
            "=",
            "brands.id")->select("brands.*");
    }

    public function popular()
    {
        return $this->joinInfo()
            ->orderBy("brand_infos.views_num", "DESC");
    }

    public function joinProduct()
    {
        return $this->join("products", "products.brand_id",
            "=", "brands.id");
    }

    public function byCategory($category_id)
    {
        return $this->joinProduct()->where("products.category_id", $category_id);
    }

    public function popInCategory($category_id)
    {
        return $this
            ->byCategory($category_id)
            ->popular();
    }
}
