<?php

namespace App\Http\Controllers\Api\Main;

use App\Domain\Product\Product\Entities\Product;
use App\Http\Controllers\Api\Base\ApiController;
use App\Http\Controllers\Controller;

class ProductOfDayController extends ApiController
{
    public function index()
    {
        return $this->result([]);
    }
}
