<?php


namespace App\Domain\Product\Entities\HeaderComponent\Header\Services;


use App\Domain\Core\Main\Services\BaseService;
use App\Domain\Product\Entities\HeaderComponent\Header\Entities\HeaderComponent;

class HeaderComponentService extends BaseService
{

    public function getEntity()
    {
        return new HeaderComponent();
    }
}
