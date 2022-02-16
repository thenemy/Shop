<?php

namespace App\Domain\User\Services;

use App\Domain\User\Interfaces\Roles;
use App\Domain\User\Jobs\CodeSenderJob;

class RegisterService extends AbstractUserService
{
    const VALIDATE_SEPARATOR = "\n";

    protected function validateCreateRules(): array
    {
        return [
            "phone" => "required",
            "password" => "required"
        ];
    }


    function getRole(): int
    {
        return Roles::USER;
    }

    protected function actionAfterCreate()
    {
        $this->entity->sendCode();
    }
}
