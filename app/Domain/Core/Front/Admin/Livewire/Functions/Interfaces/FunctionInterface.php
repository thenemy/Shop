<?php

namespace App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces;

interface FunctionInterface
{
    const FUNCTION_TEMPLATE = "public function %s(%s){}";
    const VARIABLE_TEMPLATE = "public $%s;";

    function generateFunction();

    static public function getFunctionName(): string;

    static public function getArguments(): array;
}
