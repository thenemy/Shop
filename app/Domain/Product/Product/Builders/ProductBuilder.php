<?php

namespace App\Domain\Product\Product\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class ProductBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "title";
    }
}
