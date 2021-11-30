<?php

namespace App\Domain\User\Entities;

use App\Domain\User\Traits\UserRelationship;

class UserCreditData
{
    use UserRelationship;

    protected $table = 'user_credit_datas';

}
