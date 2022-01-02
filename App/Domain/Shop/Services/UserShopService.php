<?php

namespace App\Domain\Shop\Services;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Services\BaseService;
use App\Domain\User\Entities\User;
use App\Domain\User\Interfaces\Roles;
use App\Domain\User\Services\UserRoleService;
use App\Domain\User\Traits\PasswordHandle;

class UserShopService extends BaseService
{
    use  PasswordHandle;

    private UserRoleService $role;

    public function __construct()
    {
        parent::__construct();
        $this->role = UserRoleService::new();
    }

    public function getEntity(): Entity
    {
        return new User();
    }

    public function create(array $object_data)
    {

        $this->updatePassword($object_data);
        $user = parent::create($object_data);
        $this->role->create([
            'user_id' => $user->id,
            'role' => Roles::SHOP
        ]);
        return $user;
    }

    public function update($object, array $object_data)
    {
        $this->updatePassword($object_data);
        return parent::update($object, $object_data);
    }
}
