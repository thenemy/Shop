<?php


namespace App\Domain\Shop\Services;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Services\BaseService;
use App\Domain\File\Traits\FileUploadService;
use App\Domain\File\Traits\FileUploadTemp;
use App\Domain\Shop\Entities\Shop;
use App\Domain\Shop\Interfaces\ShopRelationInterface;
use App\Domain\User\Services\UserService;
use Illuminate\Support\Facades\DB;

class ShopService extends BaseService implements ShopRelationInterface
{
    use FileUploadService;

    public UserShopService $userService;

    public function __construct()
    {
        $this->userService = new UserShopService();
        parent::__construct();
    }

    public function getEntity(): Entity
    {
        return new Shop();
    }

    /**
     * @throws \Throwable
     */
    public function create(array $object_data)
    {
        $this->serializeTempFile($object_data);
        try {
            DB::beginTransaction();
            $user_array = $this->popCondition($object_data, self::USER);
            $store = ["id" => $this->userService->create($user_array)->id];
            $shop_array = array_merge($store, $object_data);
            $object = parent::create($shop_array);
            DB::commit();
            return $object;
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    /**
     * @throws \Throwable
     */
    public function update($object, array $object_data)
    {
        try {
            DB::beginTransaction();
            $userData = $this->popCondition($object_data, self::USER);
            if (!empty($userData)) {
                $this->userService->update($object[self::USER], $userData);
            }
            $object = $this->update($object, $object_data);
            DB::commit();
            return $object;
        } catch (\Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}
