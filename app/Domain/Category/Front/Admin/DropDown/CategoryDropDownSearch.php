<?php

namespace App\Domain\Category\Front\Admin\DropDown;

use App\Domain\Category\Entities\Category;
use App\Domain\Core\Front\Admin\DropDown\Items\DropItem;
use App\Domain\Core\Front\Admin\Form\Attributes\Base\BaseDropDownSearchAttribute;

class CategoryDropDownSearch extends BaseDropDownSearchAttribute
{
    public static function newCat(
        bool $create = true, array $filterBy = [])
    {
        return self::new("name", "названию Категорий",
            $create, $filterBy);
    }

    function setType(): string
    {
        return "number";
    }

    function setKey(): string
    {
        return "category_id";
    }

    function setName(): string
    {
        return "Выберите категорию";
    }

    public static function getDropDownSearch($initial, array $filterBy): CategoryDropDownSearch
    {
        $filterBy['depth'] = Category::orderBy("depth", "DESC")->first()->depth ?? 0;
        return self::getDropDown($initial, $filterBy, Category::class, 'name_current');
    }

}
