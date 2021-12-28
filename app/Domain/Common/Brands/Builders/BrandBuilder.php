<?php

namespace App\Domain\Common\Brands\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class BrandBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "brand";
    }
}
