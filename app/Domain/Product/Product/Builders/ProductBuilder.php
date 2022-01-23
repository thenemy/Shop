<?php

namespace App\Domain\Product\Product\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;
use App\Domain\CreditProduct\Builders\MainCreditBuilder;
use App\Domain\Product\Product\Interfaces\ProductInterface;

class ProductBuilder extends BuilderEntity
{
    public function filterByNot($filter): ProductBuilder
    {
        if (isset($filter['discount_id'])) { // integer value come here
            $this->whereNotIn("id", function ($query) use ($filter) {
                return $query->from("products") // create subquery, must return single column
                ->join('discount_product',
                    "discount_product.product_id",
                    '=', 'products.id')
                    ->where("discount_product.discount_id", "=", $filter['discount_id'])
                    ->select('products.id');
            });
        }
        return $this;
    }

    public function filterBy($filter): ProductBuilder
    {
        if (isset($filter['discount_id'])) {
            $this->byDiscount($filter['discount_id']);
        }
        return parent::filterBy($filter);
    }

    public function byDiscount($discount_id): ProductBuilder
    {
        return $this->joinDiscount()->
        where("product_id", '=', $discount_id);
    }

    public function joinDiscount($join = "inner"): ProductBuilder
    {
        return $this->join('discount_product',
            "discount_product.product_id",
            '=', 'products.id',
            $join)->select('products.*');
    }

    protected function getSearch(): string
    {
        return "title";
    }

    public function currencyUSD()
    {
        return $this->where('currency', ProductInterface::CURRENCY_USD_DB);
    }

    public function currencyUZS()
    {
        return $this->where('currency', ProductInterface::CURRENCY_UZS_DB);
    }


}
