<?php

namespace App\Domain\Delivery\Entities;

use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Delivery\Builders\AvailableCityBuilder;

class AvailableCities extends Entity
{
    use Translatable;

    protected $table = 'available_cities';

    public function newEloquentBuilder($query): AvailableCityBuilder
    {
        return new AvailableCityBuilder($query);
    }

    public function getCityNameAttribute(): ?\Illuminate\Support\Collection
    {
        return $this->getTranslations("cityName");
    }

    public function getCityNameCurrentAttribute(): ?string
    {
        return $this->getTranslatable("cityName");
    }

    public function getFullNameAttribute()
    {
        if ($this->id)
            return $this->regionName . " " . $this->getCityNameCurrentAttribute();
    }

    public function setCityNameAttribute($value)
    {
        $this->setTranslate("cityName", $value);
    }

    public function getCountryNameAttribute(): ?\Illuminate\Support\Collection
    {
        return $this->getTranslations("countryName");
    }

    public function setCountryNameAttribute($value)
    {
        $this->setTranslate("countryName", $value);
    }
}
