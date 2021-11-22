<?php

namespace App\Domain\Core\Front\Admin\Livewire\Functions\Traits;

use App\Domain\Core\Front\Admin\Livewire\Functions\Base\LivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\FunctionInterface;

trait FunctionGenerate
{
    abstract static public function getFunctionName(): string;

    abstract static public function getArguments(): array;

    abstract static public function getVariable(): string;

    abstract static public function getVariableBlade(): string;

    static public function toRealBlade(): string
    {
        return "$" . self::getVariableBlade();
    }

    protected function toThisVariable(): string
    {
        return "$" . "this" . "->" . $this->getVariable();
    }

    abstract protected function initializeFunction();

    public function generateInitialization(): string
    {
        return sprintf("'%s' => %s", $this->getVariableBlade(), $this->initializeFunction());
    }

    public function generateVariable(): string
    {
        return sprintf(FunctionInterface::VARIABLE_TEMPLATE, $this->getVariable());
    }

    abstract public function generateFunction(): string;

}
