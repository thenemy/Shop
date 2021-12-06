<?php

namespace App\Domain\User\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class UserBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "phone";
    }
}
