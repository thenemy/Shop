<?php

namespace App\Domain\Core\Front\Interfaces;

use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;

interface FrontEntityInterface
{
    public function livewireComponents(): LivewireAdditionalFunctions;
}
