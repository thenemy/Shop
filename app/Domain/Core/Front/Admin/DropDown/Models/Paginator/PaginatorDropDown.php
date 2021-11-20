<?php

namespace App\Domain\Core\Front\Admin\DropDown\Models\Paginator;

use App\Domain\Core\Front\Admin\DropDown\Abstracts\AbstractDropDown;
use App\Domain\Core\Front\Admin\DropDown\Abstracts\AbstractLivewireDropDown;
use App\Domain\Core\Front\Admin\DropDown\Items\DropLivewireItem;
use App\Domain\Core\Front\Admin\Livewire\Functions\Traits\FunctionGenerate;

class PaginatorDropDown extends AbstractLivewireDropDown
{
    use FunctionGenerate;

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

    static public function getDropDown($name = null): AbstractDropDown
    {
        return new self([
            new DropLivewireItem(
                50,
                50,
                sprintf(
                    self::FORMAT_CLICK,
                    self::getFunctionName(),
                    50
                )),
            new DropLivewireItem(
                40,
                40,
                sprintf(
                    self::FORMAT_CLICK,
                    self::getFunctionName(),
                    40
                )
            ),
        ], $name);
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
