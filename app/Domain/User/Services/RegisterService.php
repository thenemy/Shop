<?php

namespace App\Domain\User\Services;

use App\Domain\User\Interfaces\Roles;
use App\Domain\User\Jobs\CodeSenderJob;

class RegisterService extends AbstractUserService
{
    const VALIDATE_SEPARATOR = "\n";
    public UserAvatarService $avatarService;

    public function __construct()
    {
        $this->avatarService = new UserAvatarService();
        parent::__construct();
    }

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

    protected function actionAfterCreate($object_data = [])
    {
        $this->entity->sendCode();
        $this->avatarService->createWith($object_data, ['user_id' => $this->entity->id]);
    }

    protected function actionAfterUpdate($object_data = [])
    {
        $this->avatarService->update($this->entity, $object_data);
    }
}
