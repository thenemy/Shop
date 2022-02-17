<?php

namespace App\Http\Controllers\Api\Category;

use App\Domain\Category\Api\CategoryAppBar;
use App\Domain\Category\Api\CategoryInMain;
use App\Domain\Category\Api\CategoryParentView;
use App\Domain\Common\Api\BrandInFilter;
use App\Domain\Common\Api\BrandMain;
use App\Domain\Common\Api\ColorInFilter;
use App\Domain\Common\Discounts\Entities\DiscountReadOnly;
use App\Domain\Product\Api\ProductCard;
use App\Domain\Shop\Api\ShopInFilter;
use App\Http\Controllers\Api\Base\ApiController;
use Illuminate\Support\Facades\Request;
use phpDocumentor\Reflection\Types\Self_;

// work on this
// write correct query for poping more popular product and discount and brand
class CategoryViewController extends ApiController
{
    const CATEGORY = 2;
    const VIEW = 0;
    const SUB_CATEGORY = 1;

    public function view(CategoryInMain $category)
    {
        $object = null;
        switch ($category->height) {
            case self::CATEGORY:
                $object = $this->categoryPage($category);
                break;
            case  self::SUB_CATEGORY:
                $object = $this->subCategoryPage($category);
                break;
            case self::VIEW;
                $object = $this->viewPage($category);
                break;
        }
        if ($object) {
            return $this->result($this->connectWithCommon($object));
        }

        return $this->errors(__("The height is bigger than expected:"
            . sprintf("Category id : %s", $this->category->id)), 500);
    }

    private function viewPage($category)
    {
        return [
            "products" => ProductCard::byCategory($category->id)
                ->filterBy(Request::all())->paginate(self::NORMAL_PAGINATE),
            "brands" => BrandInFilter::byCategory($category->id)->get(),
            "colors" => ColorInFilter::byCategory($category->id)->get(),
            "shops" => ShopInFilter::byCategory($category->id)->get()
        ];
    }

    private function categoryPage($category): array
    {
        return [
            "side_category" => CategoryAppBar::childs($category->id),
            "discounts" => [
                self::FILTER => "discount",
                "items" => DiscountReadOnly::active()->get()
            ],
            "product_in_categories" => CategoryParentView::childs($category->id)->get()
        ];
    }

    private function subCategoryPage($category): array
    {
        return [
            "side_category" => CategoryAppBar::childs($category->parent_id),
            "sub_categories" => CategoryInMain::childs($category->id)->get(),
            "pop_products" => ProductCard::popInCategory($category->id)
                ->paginate(self::BIG_PAGINATE),
            "discount_products" => ProductCard::disInCategory($category->id)
                ->paginate(self::BIG_PAGINATE),
        ];
    }

    public function productInCategory(CategoryParentView $category)
    {
        return $this->result($category->products()->take(self::BIG_PAGINATE));
    }

    public function brand(CategoryInMain $category)
    {
        return $this->result([
            "brands" => BrandMain::popInCategory($category->id)
        ]);
    }
}
