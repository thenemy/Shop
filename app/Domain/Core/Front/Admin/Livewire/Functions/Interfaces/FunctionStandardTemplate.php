<?php

namespace App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces;

interface FunctionStandardTemplate
{
    const FUNCTION_TEMPLATE = "public function %s(%s){}";
    const FUNCTION_BODY = "public function %s(%s){%s}";
    const VARIABLE_TEMPLATE = "public $%s;";

}
