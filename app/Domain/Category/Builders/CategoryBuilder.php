<?php

namespace App\Domain\Category\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;
use Illuminate\Support\Facades\DB;

class CategoryBuilder extends BuilderEntity
{
    public function onlyParent()
    {
        return $this->where("depth", "=", 1);
    }

    public function active()
    {
        return $this->where("status", true);
    }

    public function childs($parent_id)
    {
        return $this->active()->where("parent_id", "=", $parent_id);
    }

    public function joinParent()
    {
        return $this->leftJoin(DB::raw("categories as first"),
            "first.id",
            "=",
            "categories.parent_id");
    }

    public function byPurchaseIn($purchases_in): CategoryBuilder
    {

        return $this->joinPurchases()->whereIn("purchases.id", $purchases_in)
            ->select("categories.*")->distinct();
    }

    private function joinProducts(): CategoryBuilder
    {
        return $this->join("products", "products.category_id",
            "=", 'categories.id');
    }

    public function joinPurchases(): CategoryBuilder
    {
        return $this->joinProducts()->join("purchases", "purchases.product_id", "=",
            "products.id");
    }

    public function filterBy($filter): CategoryBuilder
    {
        parent::filterBy($filter);
        if (isset($filter['parent_id'])) {
            $this->where($this->getParent(), '=', $filter['parent_id'])
                ->where("id", "!=", $filter['parent_id']);
        }
        if (isset($filter['depth'])) {
            $this->where("depth", "=", $filter['depth']);
        }
        return $this;
    }

    public function filterByNot($filter): CategoryBuilder
    {

        if (isset($filter["parent_id"])) {
            $this->where(function ($builder) use ($filter) {
                $builder->where(function (BuilderEntity $builder) use ($filter) {
                    return $builder->whereNull($this->getParent())
                        ->where("id", "!=", $filter["parent_id"]);
                })->orWhere($this->getParent(), "!=", $filter["parent_id"]);
            });
        }

        return $this;
    }

    protected function getSearch(): string
    {
        return "name";
    }
}
