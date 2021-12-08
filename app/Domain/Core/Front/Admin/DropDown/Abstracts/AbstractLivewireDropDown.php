<?php

namespace App\Domain\Core\Front\Admin\DropDown\Abstracts;

use App\Domain\Core\Front\Admin\DropDown\Traits\InitStaticDropFunction;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\FunctionHelperStaticInterface;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\FunctionInterface;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\FunctionStandardTemplate;
use App\Domain\Core\Front\Admin\Livewire\Functions\Traits\FunctionFormatArg;
use App\Domain\Core\Front\Admin\Livewire\Functions\Traits\FunctionGenerate;
use App\Domain\Core\Front\Interfaces\HtmlInterface;

abstract class AbstractLivewireDropDown extends AbstractDropDown
    implements HtmlInterface, FunctionInterface, FunctionHelperStaticInterface, FunctionStandardTemplate
{
    use FunctionFormatArg, FunctionGenerate, InitStaticDropFunction;

    public function generateFunction(): string
    {
        return sprintf(self::FUNCTION_BODY,
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
        return $this->initGetDropDown($this->toThisVariable());
    }

    public function setKey(): string
    {
        return "";
    }

    public function setType(): string
    {
        return "";
    }

    abstract static public function formatClick($value);

}
