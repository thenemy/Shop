<?php

namespace App\Domain\Core\Front\Admin\DropDown\Models\Paginator;

use App\Domain\Core\Front\Admin\DropDown\Abstracts\AbstractDropDown;
use App\Domain\Core\Front\Admin\DropDown\Abstracts\AbstractLivewireDropDown;
use App\Domain\Core\Front\Admin\DropDown\Items\DropLivewireItem;

// example of additional drop down

// good for sorting
class PaginatorDropDown extends AbstractLivewireDropDown
{
    const  FORMAT_CLICK = "%s(%s)";

    static public function getDropDown($name = null): AbstractDropDown
    {
        return new self([
            new DropLivewireItem(
                10,
                self::formatClick(10),
                new DropLivewireItem(
                    2,
                    self::formatClick(2)
                )),
        ], $name);
    }

    static public function formatClick($value): string
    {
        return sprintf(self::FORMAT_CLICK,
            self::getFunctionName(), $value);
    }

    function setType(): string
    {
        return "text";
    }

    function setKey(): string
    {
        return "paginator";
    }

    function setName(): string
    {
        return __("Выберите размер списка");
    }


    public function generateHtml(): string
    {
        return sprintf("<x-helper.drop_down.drop_down_livewire :drop='%s' />",
            self::toRealBlade(self::getVariableBlade()));
    }

    static public function getFunctionName(): string
    {
        return "newClass";
    }

    static public function getArguments(): array
    {
        return [
            "test",
        ];
    }

    static public function getVariable(): string
    {
        return "selected_value";
    }

    static public function getVariableBlade(): string
    {
        return "name_blade";
    }


}
