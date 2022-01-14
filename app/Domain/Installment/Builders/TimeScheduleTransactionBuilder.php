<?php

namespace App\Domain\Installment\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class TimeScheduleTransactionBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "detail";
    }
}
