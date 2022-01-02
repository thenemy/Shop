<?php

namespace App\Domain\Product\Product\Jobs;

use App\Domain\Core\BackgroundTask\Base\AbstractJob;
use App\Domain\Product\Product\Entities\Product;

class ProductOfDayJob extends AbstractJob
{
    public Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function handle()
    {
        sleep(60 * 60 * 24);
        $this->product->productDay()->delete();
    }
}
