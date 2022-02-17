<?php

namespace App\Http\Controllers\Api\Main;

use App\Domain\Category\Api\CategoryAppBar;
use App\Domain\Category\Api\CategoryInMain;
use App\Domain\Common\Banners\Entities\BannerReadOnly;
use App\Domain\Common\Discounts\Entities\DiscountReadOnly;
use App\Domain\Product\Api\ProductCard;
use App\Domain\Product\Product\Entities\ProductOfDay;
use App\Http\Controllers\Api\Base\ApiController;
use App\Http\Controllers\Api\Traits\CommonComponents;

class MainController extends ApiController
{
    use CommonComponents;

    public function main()
    {
        return $this->result($this->connectWithCommon([
            "banners" => BannerReadOnly::all(),
            "product_of_day" => ProductOfDay::all(),
            "discount" => [
                self::FILTER => "discount",
                "items" => DiscountReadOnly::active()->get()
            ]
        ]));
    }


    public function header(): \Illuminate\Http\JsonResponse
    {
        return $this->result($this->getHeader());
    }

    public function category()
    {
        return $this->result(CategoryInMain::active()->take(6));
    }

    public function hitProduct()
    {
        return $this->result(ProductCard::joinHit()->get());
    }

    public function products()
    {
        return $this->result(ProductCard::orderBy("id", "DESC")->get());
    }
}
