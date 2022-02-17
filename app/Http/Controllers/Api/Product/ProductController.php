<?php

namespace App\Http\Controllers\Api\Product;

use App\Domain\Product\Api\ProductView;
use App\Domain\Product\Product\Entities\Product;
use App\Http\Controllers\Api\Base\ApiController;

class ProductController extends ApiController
{
    public function view(ProductView $product)
    {
        return $this->result($product->toArray());
    }

    public function rate(ProductView $product)
    {
        return $this->result([
            "mark_5" => $this->markNumber($product, 5),
            "mark_4" => $this->markNumber($product, 4),
            "mark_3" => $this->markNumber($product, 3),
            "mark_2" => $this->markNumber($product, 2),
            "mark_1" => $this->markNumber($product, 1),
            "mark" => $product->mark()->avg("mark"),
            "mark_num"=> $product->mark()->count()
        ]);
    }

    private function markNumber(ProductView $product, $mark): int
    {
        return $product->mark()->where("mark", "=", $mark)->count();
    }
}
