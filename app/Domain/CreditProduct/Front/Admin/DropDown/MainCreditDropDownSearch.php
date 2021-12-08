<?php

namespace App\Domain\CreditProduct\Front\Admin\DropDown;


use App\Domain\Core\Front\Admin\Form\Attributes\Base\BaseDropDownSearchAttribute;
use App\Domain\CreditProduct\Entity\MainCredit;

class MainCreditDropDownSearch extends BaseDropDownSearchAttribute
{
    public static function newCredit(
        bool $create = true, array $filterBy = [])
    {
        return self::new("name", "названию Рассрочки",
            $create, $filterBy);
    }

    function setType(): string
    {
        return "number";
    }

    function setKey(): string
    {
        return "main_credit_id";
    }

    function setName(): string
    {
        return "Выберите вид рассрочки";
    }

    static public function getDropDownSearch($initial, array $filterBy)
    {
        return parent::getDropDown($initial, $filterBy, MainCredit::class, "name");
    }
}
