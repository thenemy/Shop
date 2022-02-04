<?php

namespace App\Domain\User\Services;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Services\BaseService;
use App\Domain\User\Entities\User;
use App\Domain\User\Interfaces\Roles;
use App\Domain\User\Traits\PasswordHandle;

abstract class AbstractUserService extends BaseService
{

    use  PasswordHandle;

    protected UserRoleService $role;

    public function __construct()
    {
        parent::__construct();
        $this->role = UserRoleService::new();
    }

    public function getEntity(): Entity
    {
        return new User();
    }

    protected function createRole($object_data, $user)
    {
        $this->role->create([
            'user_id' => $user->id,
            'role' => $this->getRole()
        ]);
    }

    public function create(array $object_data)
    {

        $this->updatePassword($object_data);
        $user = parent::create($object_data);
        $this->createRole($object_data, $user);
        return $user;
    }

    public function update($object, array $object_data)
    {
        $this->updatePassword($object_data);
        return parent::update($object, $object_data);
    }

    abstract function getRole(): int;
}
