<?php

namespace App\Domain\Shop\Front\Main;


use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileTempAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Shop\Entities\Shop;

class ShopCreate extends Shop implements CreateAttributesInterface
{
    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            new InputAttribute("name", "text", "Имя Магазина"),
            new InputAttribute(self::USER_TO . "phone", "text", "Телефон пользователя"),
            new InputAttribute(self::USER_TO . "password", "password", "Пароль"),
            new InputFileTempAttribute("image", "Фото магазина"),
            new InputFileTempAttribute("logo", "Лого Магазина"),
            new InputFileTempAttribute("document", "Документы"),
            new InputFileTempAttribute("licence", "Лицензия"),
            new InputFileTempAttribute("director_passport", "Паспорт директора"),
        ]);
    }
}
