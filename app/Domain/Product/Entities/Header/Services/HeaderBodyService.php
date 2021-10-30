<?php


namespace App\Domain\Product\Entities\Header\Services;


use App\Domain\Core\Main\Services\BaseService;
use App\Domain\Product\Entities\Header\Entities\HeaderBody;

class HeaderBodyService extends BaseService
{

    public function getEntity()
    {
       return new HeaderBody();
    }
}
