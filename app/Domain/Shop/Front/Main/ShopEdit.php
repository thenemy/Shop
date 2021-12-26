<?php

namespace App\Domain\Shop\Front\Main;

use App\Domain\Core\Front\Admin\File\Attributes\FileAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Shop\Entities\Shop;
use App\Domain\Shop\Front\Dynamic\WorkTimesDynamic;

class ShopEdit extends Shop implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            new InputAttribute("name", "text",
                "Имя Магазина", false),
            new InputAttribute(self::USER_TO . "phone", "text",
                "Телефон пользователя", false),
            new InputAttribute(self::USER_TO . "password", "password",
                "Пароль"),
            WorkTimesDynamic::getDynamic("ShopEdit", self::SHOP_ADDRESS_TO . "id"),
            new InputFileAttribute("image_file", "Фото магазина", self::class),
            new InputFileAttribute("logo_file", "Лого Магазина", self::class),
            new InputFileAttribute("document_file", "Документы", self::class),
            new InputFileAttribute("licence_file", "Лицензия", self::class),
            new InputFileAttribute("passport_file", "Паспорт директора", self::class),
        ]);
    }

    public function getImageFileAttribute(): FileAttribute
    {
        return new FileAttribute($this, "image", "shop_1");
    }

    public function getLogoFileAttribute(): FileAttribute
    {
        return new FileAttribute($this, "logo", "shop_2");
    }

    public function getDocumentFileAttribute(): FileAttribute
    {
        return new FileAttribute($this, "document", "shop_3");
    }

    public function getLicenceFileAttribute(): FileAttribute
    {
        return new FileAttribute($this, "licence", "shop_4");
    }

    public function getPassportFileAttribute(): FileAttribute
    {
        return new FileAttribute($this, "director_passport", "shop_5");
    }
}
