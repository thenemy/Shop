<?php

namespace App\Domain\Core\Front\Admin\DropDown\Models\Paginator;

use App\Domain\Core\Front\Admin\DropDown\Abstracts\AbstractDropDown;
use App\Domain\Core\Front\Admin\DropDown\Abstracts\AbstractLivewireDropDown;
use App\Domain\Core\Front\Admin\DropDown\Items\DropLivewireItem;
use App\Domain\Core\Front\Admin\Livewire\Functions\Traits\FunctionGenerate;

// example of additional drop down
class PaginatorDropDown extends AbstractLivewireDropDown
{
    use FunctionGenerate;

    static public function getDropDown($name = null): AbstractDropDown
    {
        return new self([
            new DropLivewireItem(
                10,
                sprintf(
                    self::FORMAT_CLICK,
                    self::getFunctionName(),
                    10
                )),
            new DropLivewireItem(
                2,
                sprintf(
                    self::FORMAT_CLICK,
                    self::getFunctionName(),
                    2
                )
            ),
        ], $name);
    }

    const  FORMAT_CLICK = "%s(%s)";

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
        return sprintf("<x-helper.drop_down.drop_down_livewire :drop='%s' />", self::toRealBlade());
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
