<?php

namespace App\Domain\Core\Front\Admin\DropDown\Abstracts;

use App\Domain\Core\Front\Admin\Attributes\Interfaces\AttributeFormInterface;
use App\Domain\Core\Front\Admin\Livewire\Functions\Traits\FunctionGenerate;

abstract class AbstractLivewireDropDown extends AbstractDropDown implements AttributeFormInterface
{
    use FunctionGenerate;

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
