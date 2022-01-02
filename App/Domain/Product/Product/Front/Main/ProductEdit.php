<?php

namespace App\Domain\Product\Product\Front\Main;

use App\Domain\Category\Front\Admin\DropDown\CategoryDropDownSearch;
use App\Domain\Common\Brands\Front\Admin\DropDown\BrandDropDownSearch;
use App\Domain\Core\File\Models\Livewire\FileLivewireNested;
use App\Domain\Core\Front\Admin\File\Attributes\FileAttribute;
use App\Domain\Core\Front\Admin\File\Attributes\FilesAttributes;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputLangAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Form\Traits\AttachNested;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\CreditProduct\Front\Nested\MainCreditNested;
use App\Domain\Product\Images\Entities\Image;
use App\Domain\Product\Product\Entities\Product;
use App\Domain\Product\Product\Front\Admin\DropDown\CurrencyDropDown;
use App\Domain\Shop\Front\Admin\DropDown\ShopDropDownSearch;

class ProductEdit extends Product implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            CategoryDropDownSearch::newCat(false),
            ShopDropDownSearch::newShop(false),
            BrandDropDownSearch::newBrand(false),
            new InputLangAttribute("title", __("Введите название"), false),
            InputAttribute::updateAttribute("number", "number", __("Введите количество данного товара")),
            CurrencyDropDown::new(false),
            InputAttribute::updateAttribute("price", "number", __("Введите цену")),
            InputAttribute::updateAttribute("percentage", "number", __("Укажите скидку") . " (%)"),
            InputAttribute::updateAttribute("weight", "number", __("Введите вес(кг)")),
            InputAttribute::updateAttribute(
                self::PRODUCT_DAY_TO . "checked",
                "checkbox",
                __("Продукт дня")),
            InputAttribute::updateAttribute(
                self::PRODUCT_HIT_TO . "checked",
                "checkbox",
                __("Хит продаж")),
            new InputFileAttribute(
                "image_main",
                "Главная картинка",
                self::class,
                true
            ),
            new InputFileAttribute(
                "image_product",
                "Картинки для товара",
                self::class,
                true,
                true
            ),
            new FileLivewireNested("ProductEdit", $this->getMainCredit())
        ]);
    }

    public function getMainCredit()
    {
        return MainCreditNested::generate(
            "acceptMainCredit",
            "Добавьте виды рассрочки для продукта",
            "product_id"
        );
    }



    public function getImageMainAttribute(): FileAttribute
    {
        return new FileAttribute(
            $this[self::CARD_IMAGE_SERVICE],
            "image",
            "product_2"
        );
    }


}
