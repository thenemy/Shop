<?php

namespace App\Domain\Core\Front\Admin\CustomTable\Interfaces;

use App\Domain\Core\Front\Admin\Livewire\Functions\Base\LivewireDropOptional;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;

interface TableInFront
{
    public function getTableClass(): string;

    public function livewireComponents(): LivewireAdditionalFunctions;

    public function livewireOptionalDropDown(): LivewireDropOptional;

    public function getTitle(): string;

    public function getActionsAttribute():string;

}
