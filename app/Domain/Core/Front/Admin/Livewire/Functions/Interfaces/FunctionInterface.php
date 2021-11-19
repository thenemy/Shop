<?php

namespace App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces;

interface FunctionInterface
{
    const FUNCTION_TEMPLATE = "public function %s(%s){}";

    public function generateFunction(): string;

    public function generateBlade(): string;

    public function getComponent(): string;

    public function getFunctionName(): string;

    public function getArguments(): array;
}
