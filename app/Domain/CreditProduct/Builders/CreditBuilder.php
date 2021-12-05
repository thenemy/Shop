<?php

namespace App\Domain\CreditProduct\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class CreditBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "percent";
    }
}
