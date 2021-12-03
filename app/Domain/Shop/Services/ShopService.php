<?php


namespace App\Domain\Shop\Services;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Services\BaseService;
use App\Domain\Shop\Entities\Shop;
use App\Domain\User\Services\UserService;

class ShopService extends BaseService
{
    public UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
        parent::__construct();
    }

    public function getEntity(): Entity
    {
        return new Shop();
    }

    public function create(array $object_data)
    {
        $user_array = $this->popCondition($object_data, "user");
        $store = ["id" => $this->userService->create($user_array)->id];
        $shop_array = array_merge($store, $object_data);
        return parent::create($shop_array);
    }

    public function update($object, array $object_data)
    {
        $userData = $this->popCondition($object_data, "user");
        $this->userService->update($object->user, $userData);
        $this->update($object, $object_data);
    }
}
