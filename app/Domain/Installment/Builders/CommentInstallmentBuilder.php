<?php

namespace App\Domain\Installment\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class CommentInstallmentBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "comment";
    }
}
