<?php

namespace App\Domain\User\Front\Main;

use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\TextAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\User\Entities\User;
use Illuminate\Validation\Rules\In;

class UserCreate extends User implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            new InputAttribute("name", "text", "Имя пользователя"),
            new InputAttribute("password", "password", "Пароль"),
            new InputAttribute("phone", "text", "Телефон пользователя")
        ]);
    }
}
