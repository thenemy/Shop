<?php

namespace App\Http\Controllers\Api\Category;

use App\Domain\Category\Api\CategoryInMain;
use App\Domain\Common\Api\BrandMain;
use App\Domain\Product\Api\ProductCard;
use App\Http\Controllers\Api\Base\ApiController;
use phpDocumentor\Reflection\Types\Self_;

// work on this
// write correct query for poping more popular product and discount and brand
class CategoryViewController extends ApiController
{
    public function view(CategoryInMain $category)
    {
        return $this->result([
            "sub_category" => CategoryInMain::childs($category->id),
            "pop_products" => ProductCard::popInCategory($category->id)
                ->paginate(self::BIG_PAGINATE),
            "discount_products" => ProductCard::disInCategory($category->id)
                ->paginate(self::BIG_PAGINATE),
        ]);
    }

    public function brand(CategoryInMain $category)
    {
        return $this->result([
            "brands" => BrandMain::popInCategory($category->id)
        ]);
    }
}
