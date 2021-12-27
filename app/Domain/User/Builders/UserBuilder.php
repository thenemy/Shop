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

    public function findByPlastic($id): UserBuilder
    {
        return $this->join("plastic_user_cards", "plastic_user_cards.user_id",
            "=", 'users.id')->where("plastic_id", '=', $id);
    }

    public function joinUserData()
    {
        return $this->join("user_credit_datas", "user_id", '=', 'users.id');
    }

    public function selectUserDataId()
    {
        return $this->joinUserData()->select("user_credit_datas.id");
    }

    public function filterBy($filter)
    {
        $this->joinRole()->where('role', Roles::USER);
        return parent::filterBy($filter); // TODO: Change the autogenerated stub
    }
}
