<?php


namespace App\Domain\Shop\Services;


use App\Domain\Core\Main\Services\BaseService;
use App\Domain\Shop\Entities\Shop;

class ShopService extends BaseService
{

    public function getEntity()
    {
        return new Shop();
    }
}
