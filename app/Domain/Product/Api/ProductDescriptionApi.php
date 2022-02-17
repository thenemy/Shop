<?php

namespace App\Domain\Product\Api;

use App\Domain\Product\Product\Entities\ProductDescription;

class ProductDescriptionApi extends ProductDescription
{
    public function toArray()
    {
        return [
            "header" => $this->header_current,
            "body" => $this->body_current
        ];
    }
}
