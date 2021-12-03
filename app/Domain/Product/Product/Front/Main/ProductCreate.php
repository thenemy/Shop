<?php

namespace App\Domain\Product\Product\Front\Main;

use App\Domain\Category\Front\Admin\DropDown\CategoryDropDownSearch;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputLangAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Product\Product\Entities\Product;
use App\Domain\Product\Product\Front\Admin\DropDown\CurrencyDropDown;
use App\Domain\Shop\Front\Admin\DropDown\ShopDropDownSearch;

class ProductCreate extends Product implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            new InputLangAttribute("title", __("Введите название")),
            new InputAttribute("price", "number", __("Введите цену")),
            CurrencyDropDown::new(),
            new InputAttribute("number", "number", __("Введите колиство данного товара")),
            CategoryDropDownSearch::newCat(),
            ShopDropDownSearch::newShop()
        ]);
    }
}
