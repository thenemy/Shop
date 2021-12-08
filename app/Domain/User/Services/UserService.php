<?php

namespace App\Domain\User\Services;

use App\Domain\Core\Main\Services\BaseService;
use App\Domain\File\Traits\FileUploadService;
use App\Domain\User\Entities\User;
use App\Domain\User\Entities\UserCreditData;
use App\Domain\User\Entities\UserRole;
use App\Domain\User\Interfaces\Roles;
use App\Domain\User\Interfaces\UserRelationInterface;
use App\Domain\User\Traits\PasswordHandle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * finish this method
 **/
class UserService extends BaseService implements UserRelationInterface
{
    use  PasswordHandle, FileUploadService;

    private CrucialDataService $crucialService;
    private UserCreditDataService $userCreditData;
    private UserRoleService $role;
    private UserAvatarService $avatarService;

    public function __construct()
    {
        parent::__construct();
        $this->crucialService = new CrucialDataService();
        $this->userCreditData = new UserCreditDataService();
        $this->role = new UserRoleService();
        $this->avatarService = new UserAvatarService();
    }

    public function getEntity(): User
    {
        return new User();
    }

    /**
     * @throws \Throwable
     */
    public function create(array $object_data)
    {
        try {
            DB::beginTransaction();
            $this->updatePassword($object_data);
            $this->serializeTempFile($object_data);
            $credit_data = $this->popCondition($object_data, self::USER_DATA_SERVICE);
            $avatar_data = $this->popCondition($object_data, self::AVATAR_SERVICE);
            $crucial_data = $this->popCondition($credit_data, self::CRUCIAL_DATA_SERVICE);
            $crucial = $this->crucialService->create($crucial_data);
            $user = parent::create($object_data);
            $credit_data['user_id'] = $user->id;
            $credit_data['crucial_data_id'] = $crucial->id;
            $this->userCreditData->create($credit_data);
            $user_array = [
                'user_id' => $user->id
            ];
            $role_data = array_merge($user_array, [
                'role' => Roles::USER
            ]);
            $this->role->create($role_data);
            $avatar_data = array_merge($user_array, $avatar_data);
            $this->avatarService->create($avatar_data);
            DB::commit();
            return $user;
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }

    }

    public function update($object, array $object_data): \App\Domain\Core\Main\Entities\Entity
    {
        try {
            DB::beginTransaction();
            $this->updatePassword($object_data);
            $this->serializeTempFile($object_data);
            $credit_data = $this->popCondition($object_data, self::USER_DATA_SERVICE);
            $avatar_data = $this->popCondition($object_data, self::AVATAR_SERVICE);
            $crucial_data = $this->popCondition($credit_data, self::CRUCIAL_DATA_SERVICE);
            if (!empty($crucial_data)) {
                $this->crucialService
                    ->update($object[self::USER_DATA_SERVICE][self::CRUCIAL_DATA_SERVICE], $crucial_data);
            } else if (!empty($avatar_data)) {
                $this->avatarService
                    ->update($object[self::AVATAR_SERVICE], $avatar_data);
            }
            $user = parent::update($object, $object_data);
            DB::commit();
            return $user;
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}
