<?php

namespace App\Domain\Product\Product\Front\Main;

use App\Domain\Category\Front\Admin\DropDown\CategoryDropDownSearch;
use App\Domain\Common\Brands\Front\Admin\DropDown\BrandDropDownSearch;
use App\Domain\Core\File\Models\Livewire\FileLivewireFactoring;
use App\Domain\Core\File\Models\Livewire\FileLivewireNestedWithoutEntity;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\ComplexAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileTempAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileTempManyAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputLangAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\CreditProduct\Front\Nested\MainCreditNested;
use App\Domain\Product\Product\Entities\Product;
use App\Domain\Product\Product\Front\Admin\DropDown\CurrencyDropDown;
use App\Domain\Shop\Front\Admin\DropDown\ShopDropDownSearch;

class ProductCreate extends Product implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            CategoryDropDownSearch::newCat(),
            ShopDropDownSearch::newShop(),
            BrandDropDownSearch::newBrand(),
            new InputLangAttribute("title", __("Введите название")),
            InputAttribute::createAttribute("number", "number", __("Введите количество данного товара")),
            CurrencyDropDown::new(),
            InputAttribute::createAttribute("price", "number", __("Введите цену")),
            InputAttribute::createAttribute("percentage", "number", __("Укажите скидку") . " (%)"),
            InputAttribute::createAttribute("weight", "number", __("Введите вес")),
            InputAttribute::createAttribute(
                self::PRODUCT_DAY_TO . "checked",
                "checkbox",
                __("Продукт дня")),
            InputAttribute::createAttribute(
                self::PRODUCT_HIT_TO . "checked",
                "checkbox",
                __("Хит продаж")),
            InputFileTempAttribute::create(self::CARD_IMAGE_TO . "image", "Главная картинка"),
            InputFileTempManyAttribute::create(self::IMAGE_TO . "image", "Картинки"),
            new  FileLivewireNestedWithoutEntity("ProductCreate", $this->getMainCredit()),
            FileLivewireFactoring::generation("Product", $this, "")
        ]);
    }

    public function getMainCredit()
    {
        return MainCreditNested::generateWithoutEntity(
            self::MAIN_CREDIT_SERVICE,
            "Добавьте виды рассрочки для продукта",
        );
    }
}
