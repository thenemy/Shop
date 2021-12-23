<?php

namespace App\Domain\Product\Product\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;
use App\Domain\Product\Product\Interfaces\ProductInterface;

class ProductBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "title";
    }

    public function filterByIn($filter)
    {
        if (isset($filter['id'])) {
            $this->whereIn('id', $filter['id']);
        }
        return $this;
    }

    public function currencyUSD()
    {
        return $this->where('currency', ProductInterface::CURRENCY_USD_DB);
    }

    public function currencyUZS()
    {
        return $this->where('currency', ProductInterface::CURRENCY_UZS_DB);
    }

    public function filterByNotIn($filter)
    {
        if (isset($filter['id'])) {
            $this->whereNotIn('id', $filter['id']);
        }
        return $this;
    }
}
