<?php

namespace App\Domain\User\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class PlasticCardBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "card_number";
    }
}
