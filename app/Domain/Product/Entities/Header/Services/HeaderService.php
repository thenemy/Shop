<?php


namespace App\Domain\Product\Entities\Header\Services;


use App\Domain\Core\Main\Services\BaseService;
use App\Domain\Product\Entities\Header\Entities\Header;

class HeaderService extends BaseService
{

    public function getEntity()
    {
        return new Header();
    }
}
