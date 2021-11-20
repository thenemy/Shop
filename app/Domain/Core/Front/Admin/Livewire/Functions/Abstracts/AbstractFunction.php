<?php

namespace App\Domain\Core\Front\Admin\Livewire\Functions\Abstracts;

use App\Domain\Core\Front\Admin\Attributes\Interfaces\AttributeFormInterface;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\FunctionInterface;
use App\Domain\Core\Front\Admin\Livewire\Functions\Traits\FunctionGenerate;

abstract class AbstractFunction implements FunctionInterface, AttributeFormInterface
{
    use FunctionGenerate;

    public function generateFunction(): string
    {
        return sprintf(FunctionInterface::FUNCTION_TEMPLATE,
            $this->getFunctionName(),
            $this->formatArguments());
    }
}
