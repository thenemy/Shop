<?php

namespace App\Domain\Shop\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class ShopBuilder extends BuilderEntity
{
    public function getSearch(): string
    {
        return "name";
    }
}
