<?php

namespace App\Domain\Product\Color\Services;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Services\BaseService;
use App\Domain\Product\Color\Entities\ProductMainColor;

class ProductMainService extends BaseService
{

    public function getEntity(): Entity
    {
        return new ProductMainColor();
    }
}
