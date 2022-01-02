<?php


namespace App\Domain\Role\Services;


use App\Domain\Core\Main\Services\BaseService;
use App\Domain\Role\Entities\Role;

class RoleServices extends BaseService
{

    public function getEntity()
    {
        return new Role();
    }
}
