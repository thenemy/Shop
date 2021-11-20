<?php

namespace App\Domain\Core\Front\Admin\Livewire\Functions\Traits;

use App\Domain\Core\Front\Admin\Livewire\Functions\Base\LivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\FunctionInterface;

trait FunctionGenerate
{

    abstract static public function getFunctionName(): string;

    abstract static public function getArguments(): array;

    abstract static public function getVariable(): string;

    static public function toRealVariable(): string
    {
        return "$" . self::getVariable();
    }

    private function thisVariable()
    {
        return "$" . "this" . '->' . self::getVariable();
    }

    abstract protected function initializeFunction();

    public function generateInitialization(): string
    {
        return $this->thisVariable() . '=' . $this->initializeFunction() . ";";
    }

    public function generateVariable(): string
    {
        return sprintf(FunctionInterface::VARIABLE_TEMPLATE, $this->getVariable());
    }

    public function generateFunction(): string
    {
        return sprintf(FunctionInterface::FUNCTION_TEMPLATE,
            $this->getFunctionName(),
            $this->formatArguments());
    }

    private function formatArguments(): string
    {
        $new_array = [];
        foreach ($this->getArguments() as $argument) {
            array_push($new_array, "$" . $argument);
        }
        return implode(",", $new_array);
    }
}
