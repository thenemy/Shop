<?php

namespace App\Domain\Core\Front\Admin\CustomTable\Interfaces;

use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireOptionalDropDown;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireComponents;

interface TableInFront
{
    public function getTableClass(): string;

    public function livewireComponents(): LivewireComponents;

    public function livewireOptionalDropDown(): AllLivewireOptionalDropDown;

    public function livewireFunctions(): LivewireAdditionalFunctions;

    public function getTitle(): string;

    public function getActionsAttribute(): string;

}
