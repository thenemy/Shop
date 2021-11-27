<?php

namespace App\Domain\Core\Front\Admin\Livewire\Functions\Traits;

trait HandleBody
{
    protected function createVariables(string $variables)
    {
        return str_replace("--", "", $variables);
    }


}
