<?php

namespace App\Domain\User\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;
use App\Domain\User\Interfaces\Roles;

class UserBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "phone";
    }

    public function joinRole(): UserBuilder
    {
        return $this->join('user_roles', 'user_id', 'id');
    }

    public function filterBy($filter)
    {
        $this->joinRole()->where('role', Roles::USER);
        return parent::filterBy($filter); // TODO: Change the autogenerated stub
    }
}
