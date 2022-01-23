<?php

namespace App\Domain\SchemaSms\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;
use App\Domain\SchemaSms\Interfaces\SchemaSmsType;

class SchemaSmsInstallmentBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "schema";
    }

    public function remainder(): SchemaSmsInstallmentBuilder
    {
        return $this->where("type", SchemaSmsType::REMAINDER_PAYMENT);
    }

    public function dayOfPayment(): SchemaSmsInstallmentBuilder
    {
        return $this->where("type", SchemaSmsType::DAY_OF_PAYMENT);
    }

    public function expired(): SchemaSmsInstallmentBuilder
    {
        return $this->where("type", SchemaSmsType::EXPIRED_PAYMENT);
    }

    public function after(): SchemaSmsInstallmentBuilder
    {
        return $this->where("type", SchemaSmsType::AFTER_PAYMENT);
    }
}
