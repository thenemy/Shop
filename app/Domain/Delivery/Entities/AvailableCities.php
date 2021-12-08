<?php

namespace App\Domain\Delivery\Entities;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Delivery\Builders\AvailableCityBuilder;

class AvailableCities extends Entity
{
    protected $table = 'available_cities';

    public function newEloquentBuilder($query): AvailableCityBuilder
    {
        return new AvailableCityBuilder($query);
    }
}
