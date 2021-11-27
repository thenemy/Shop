<?php

namespace App\Domain\Core\Front\Admin\DropDown\Abstracts;

use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\FunctionHelperStaticInterface;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\FunctionInterface;
use App\Domain\Core\Front\Admin\Livewire\Functions\Traits\FunctionFormatArg;
use App\Domain\Core\Front\Admin\Livewire\Functions\Traits\FunctionGenerate;
use App\Domain\Core\Front\Interfaces\HtmlInterface;

abstract class AbstractLivewireDropDown extends AbstractDropDown
    implements HtmlInterface, FunctionInterface , FunctionHelperStaticInterface
{
    use FunctionFormatArg, FunctionGenerate
;

    private const TEMPLATE = "public function %s(%s){
        %s
    }";


    public function generateFunction(): string
    {
        return sprintf(self::TEMPLATE,
            $this->getFunctionName(),
            $this->formatArguments(),
            $this->getAssignment()
        );
    }

    private function getAssignment(): string
    {
        return $this->toThisVariable() . '=' . '$' . $this->getArguments()[0] . ";";
    }

    protected function initializeFunction(): string
    {
        return "\\" . get_called_class() . "::" . "getDropDown(" . $this->toThisVariable() . "),";
    }

    public function setKey(): string
    {
        return "";
    }

    public function setType(): string
    {
        return "";
    }
}
