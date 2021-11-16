<?php


namespace App\Domain\User\Entities;


use App\Domain\Core\Main\Entities\Entity;
use App\Domain\User\Traits\SmsTrait;

class User extends Entity
{
    use SmsTrait;

    protected $table = 'users';
}
