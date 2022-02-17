<?php

namespace App\Http\Controllers\Api\Action;

use App\Domain\Product\Product\Entities\Product;
use App\Http\Controllers\Api\Base\ApiController;

class FavouriteController extends ApiController
{
    public function favourite(Product $product)
    {
        auth()->user()->favourite()->attach($product);
    }

    public function detach(Product $product)
    {
        auth()->user()->favourite()->detach($product);
    }
}
