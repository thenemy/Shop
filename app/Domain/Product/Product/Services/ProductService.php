<?php

namespace App\Domain\Product\Product\Services;

use App\Domain\Core\Main\Services\BaseService;
use App\Domain\Product\Product\Entities\Product;

class ProductService extends BaseService
{

    public function getEntity(): Product
    {
        return new Product();
    }
}
