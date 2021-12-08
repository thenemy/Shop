<?php

namespace App\Domain\User\Services;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Services\BaseService;
use App\Domain\User\Entities\UserAvatar;

class UserAvatarService extends BaseService
{

    public function getEntity(): Entity
    {
        return new UserAvatar();
    }
}
