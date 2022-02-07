<?php

namespace App\Domain\Payment\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class PaymentBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "purchase_id";
    }
}
