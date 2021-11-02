<?php


namespace App\Domain\Product\Entities\HeaderTable\Services;


use App\Domain\Core\Main\Services\BaseService;
use App\Domain\Product\Entities\HeaderTable\Entities\HeaderTableValueText;

class HeaderTableValueTextService extends BaseService
{

    public function getEntity()
    {
        return new HeaderTableValueText();
    }
}