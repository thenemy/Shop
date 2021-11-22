<?php

namespace App\Domain\Core\Front\Admin\Livewire\Functions\Base;

use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireBlades;

class LivewireFunctions implements LivewireAdditionalFunctions , LivewireBlades
{
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function generateFunctions(): string
    {
        $str_functions = "";
        $str_variables = "";

        foreach ($this->items as $item) {
            $str_functions = $str_functions . " " . $item->generateFunction();
            $str_variables = $str_variables . ' ' . $item->generateVariable();
        }
        return $str_variables . " " . $str_functions;
    }

    public function initializeVariables(): string
    {
        $str_initialization = "";
        foreach ($this->items as $item) {
            $str_initialization = $str_initialization . "\n" . $item->generateInitialization();
        }
        return $str_initialization;
    }

    public function generateBlades(): string
    {
        $str = "";
        foreach ($this->items as $item) {
            $str = $str . " " . $item->generateHtml();
        }
        return $str;
    }
}
