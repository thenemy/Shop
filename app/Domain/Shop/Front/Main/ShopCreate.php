<?php

namespace App\Domain\Shop\Front\Main;

use App\Domain\Core\Front\Admin\File\Attributes\FileAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Shop\Entities\Shop;

class ShopCreate extends Shop implements CreateAttributesInterface
{
    public function generateAttributes(): BladeGenerator
        {
        return BladeGenerator::generation([
            new InputAttribute("name_user", "text", "Имя пользователя"),
            new InputAttribute("password_user", "password", "Пароль"),
            new InputAttribute("phone_user", "text", "Телефон пользователя"),
            new InputAttribute("name", "text", "Введите название магазина"),
        ]);
    }
}
