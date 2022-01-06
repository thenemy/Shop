<?php

namespace App\Domain\CreditProduct\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class MainCreditBuilder extends BuilderEntity
{
    public function filterByNot($filter)
    {
        if (isset($filter['product_id'])) {
            $this->whereNotIn("id", function ($query) use ($filter) {
                return $query->from("main_credits")
                    ->join('product_credits',
                        "product_credits.main_credit_id",
                        '=', 'main_credits.id')
                    ->where("product_id", "=", $filter['product_id'])
                    ->select('main_credits.id');
            });
        }
        return $this;
    }

    public function filterBy($filter)
    {
        if (isset($filter['product_id'])) {
            $this->byProduct($filter['product_id']);
        }
        return parent::filterBy($filter);
    }

    public function byProduct($product_id)
    {
        return $this->joinProduct()->
        where("product_id", '=', $product_id);
    }

    public function joinProduct($join = "inner"): MainCreditBuilder
    {
        return $this->join('product_credits',
            "product_credits.main_credit_id",
            '=', 'main_credits.id',
            $join)->select('main_credits.*');
    }

    protected function getSearch(): string
    {
        return "name->" . app()->getLocale();
    }
}
