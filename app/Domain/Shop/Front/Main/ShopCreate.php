<?php

namespace App\Domain\Shop\Front\Main;

use App\Domain\Core\File\Models\Livewire\FileLivewireNestedWithoutEntity;
use App\Domain\Core\Front\Admin\File\Attributes\FileAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileTempAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Shop\Entities\Shop;
use App\Domain\Shop\Front\Dynamic\WorkTimesDynamic;

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
