<?php

namespace App\Domain\Installment\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class TakenCreditBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "purchase_id";
    }
}
