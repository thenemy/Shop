<?php

namespace App\Domain\Core\Front\Admin\Livewire\Functions\Models;

use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\FunctionStandardTemplate;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;

class VariableGenerator implements LivewireAdditionalFunctions, FunctionStandardTemplate
{
    private array $variables;

    public function __construct(array $variables)
    {
        $this->variables = $variables;
    }

    public static function new($variables)
    {
        return new self($variables);
    }

    public function generateFunctions(): string
    {
        $str = "";
        foreach ($this->variables as $item) {
            $str = $str . sprintf(self::VARIABLE_TEMPLATE, $item);
        }
        return $str;
    }
}
