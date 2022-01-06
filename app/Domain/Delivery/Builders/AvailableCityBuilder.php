<?php

namespace App\Domain\Delivery\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class AvailableCityBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "cityName";
    }
}
