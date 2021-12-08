<?php

namespace App\Domain\User\Front\Admin\DropDown;

use App\Domain\Core\Front\Admin\Form\Attributes\Base\BaseDropDownSearchAttribute;
use App\Domain\User\Entities\User;

class UserDropDownSearch extends BaseDropDownSearchAttribute
{
    public static function newUser(bool $create = true, array $filterBy = [])
    {
        return self::new("phone", "номеру пользователя", $create, $filterBy);
    }

    function setType(): string
    {
        return "number";
    }

    function setKey(): string
    {
        return "user_id";
    }

    function setName(): string
    {
        return "Выберите клиента";
    }

    static public function getDropDownSearch($initial, array $filterBy)
    {
        return self::getDropDown($initial, $filterBy, User::class, 'phone');
    }
}
