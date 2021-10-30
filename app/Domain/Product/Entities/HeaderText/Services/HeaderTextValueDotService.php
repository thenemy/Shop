<?php


namespace App\Domain\Product\Entities\HeaderText\Services;


use App\Domain\Core\Main\Services\BaseService;
use App\Domain\Product\Entities\HeaderText\Entitites\HeaderTextValueDot;

class HeaderTextValueDotService extends BaseService
{

    public function getEntity()
    {
        return new HeaderTextValueDot();
    }
}
