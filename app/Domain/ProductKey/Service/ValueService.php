<?php


namespace App\Domain\ProductKey\Service;


use App\Domain\Core\Main\Services\BaseService;
use App\Domain\ProductKey\Entities\Value;

class ValueService extends BaseService
{

    public function getEntity()
    {
        return new Value();
    }
}
