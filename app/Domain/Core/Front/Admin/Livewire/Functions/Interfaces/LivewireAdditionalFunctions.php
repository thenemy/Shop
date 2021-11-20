<?php

namespace App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces;

interface LivewireAdditionalFunctions
{
    public function generateFunctions():string;

    public function generateBlades():string;
}
