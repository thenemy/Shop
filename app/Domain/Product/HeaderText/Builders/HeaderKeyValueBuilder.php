<?php

namespace App\Domain\Product\HeaderText\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class HeaderKeyValueBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "key";
    }

    public function filterBy($filter)
    {
        if ($filter['header_product_id']) {
            $this->where("header_product_id", "=", $filter["header_product_id"]);
        }
        return parent::filterBy($filter); // TODO: Change the autogenerated stub
    }
}