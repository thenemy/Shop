<?php

namespace App\Domain\Core\Front\Admin\Livewire\Functions\Abstracts;

use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\FunctionInterface;

abstract class AbstractFunction implements FunctionInterface
{
    public function generateFunction(): string
    {
        return sprintf(self::FUNCTION_TEMPLATE, $this->getFunctionName(), $this->formatArguments());
    }

    private function formatArguments(): string
    {
        return implode(",", $this->getArguments());
    }
}
