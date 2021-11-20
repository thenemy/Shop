<?php

namespace App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces;

interface FunctionInterface
{
    const FUNCTION_TEMPLATE = "public function %s(%s){}";
    const VARIABLE_TEMPLATE = "public $%s;";

    public function generateFunction(): string;

    public function generateVariable(): string;

    public function getFunctionName(): string;

    public function getArguments(): array;

    public function getVariable(): string;
}
