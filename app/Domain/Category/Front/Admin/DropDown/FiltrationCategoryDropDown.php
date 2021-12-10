<?php

namespace App\Domain\Category\Front\Admin\DropDown;

use App\Domain\Category\Interfaces\FiltrationInterface;
use App\Domain\Core\Front\Admin\DropDown\Abstracts\AbstractDropDown;
use App\Domain\Core\Front\Admin\DropDown\Abstracts\AbstractDropDownAttributeTable;
use App\Domain\Core\Front\Admin\DropDown\Items\DropItem;

class FiltrationCategoryDropDown extends AbstractDropDownAttributeTable
{
    function setType(): string
    {
        return 'number';
    }

    function setKey(): string
    {
        return 'attribute';
    }

    function setName(): string
    {
        return "Выберите компонент";
    }

    static public function generate($model, $name = null): AbstractDropDown
    {
        return new self([
            new DropItem(FiltrationInterface::TEXT, FiltrationInterface::TEXT_FRONT),
            new DropItem(FiltrationInterface::IMAGE, FiltrationInterface::IMAGE_FRONT),
            new DropItem(FiltrationInterface::DESCRIPTION, FiltrationInterface::DESCRIPTION_FRONT),
        ], $model, FiltrationInterface::DB_TO_FRONT[$name] ?? null);
    }
}
