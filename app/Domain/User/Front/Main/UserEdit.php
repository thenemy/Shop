<?php

namespace App\Domain\User\Front\Main;

use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\User\Entities\User;

class UserEdit extends User implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            new InputAttribute("name", "text", "Имя пользователя" , false),
            new InputAttribute("password", "password", "Пароль", true),
            new InputAttribute("phone", "text", "Телефон пользователя", false)
        ]);
    }
}
