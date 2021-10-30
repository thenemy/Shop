<?php


namespace App\Domain\ProductKey\Service;


use App\Domain\Core\Main\Services\BaseService;
use App\Domain\ProductKey\Entities\Key;

class KeyService extends BaseService
{

    public function getEntity()
    {
        return new Key();
    }
}
