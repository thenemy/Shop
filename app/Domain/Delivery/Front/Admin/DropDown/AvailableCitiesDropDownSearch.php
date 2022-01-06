<?php

namespace App\Domain\Delivery\Front\Admin\DropDown;

use App\Domain\Core\Front\Admin\Form\Attributes\Base\BaseDropDownSearchAttribute;
use App\Domain\Delivery\Entities\AvailableCities;

class AvailableCitiesDropDownSearch extends BaseDropDownSearchAttribute
{

    static public function newCities(bool $create = true, array $filterBy = [])
    {
        return parent::new(
            'cityName',
            "названию городу",
            $create,
            $filterBy
        );
    }

    function setType(): string
    {
        return "number";
    }

    function setKey(): string
    {
        return "city_id";
    }

    function setName(): string
    {
        return "Выберите город";
    }

    static public function getDropDownSearch($initial, array $filterBy)
    {
        return parent::getDropDown($initial, $filterBy, AvailableCities::class, "cityName");
    }
}
