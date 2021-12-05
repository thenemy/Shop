<?php

namespace App\Domain\CreditProduct\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class MainCreditBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "name";
    }
}
