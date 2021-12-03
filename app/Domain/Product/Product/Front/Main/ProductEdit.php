<?php

namespace App\Domain\Product\Product\Front\Main;

use App\Domain\Category\Front\Admin\DropDown\CategoryDropDownSearch;
use App\Domain\Core\Front\Admin\File\Attributes\FileAttribute;
use App\Domain\Core\Front\Admin\File\Attributes\FilesAttributes;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputLangAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Product\Images\Entities\Image;
use App\Domain\Product\Product\Entities\Product;
use App\Domain\Product\Product\Front\Admin\DropDown\CurrencyDropDown;
use App\Domain\Shop\Front\Admin\DropDown\ShopDropDownSearch;

class ProductEdit extends Product implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            new InputLangAttribute("title", __("Введите название"), false),
            new InputAttribute("price", "number", __("Введите цену"), false),
            CurrencyDropDown::new(false),
            new InputAttribute("number", "number", __("Введите колиство данного товара"), false),
            CategoryDropDownSearch::newCat(false),
            ShopDropDownSearch::newShop(false),
            new InputFileAttribute(
                "image_product",
                "Картинки для товара",
                self::class,
                true)
        ]);
    }

    public function getImageProductAttribute(): FilesAttributes
    {
        return new FilesAttributes($this,
            "images",
            "product_1",
            Image::class,
            "image",
            "product_id");
    }


}
