<?php

namespace App\Domain\User\Front\Main;

use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInFront;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\LivewireDropOptional;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\LivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Core\Front\Interfaces\FrontEntityInterface;
use App\Domain\User\Entities\User;
use App\Domain\User\Front\Admin\CustomTable\Tables\UserTable;

class UserIndex extends User implements
    CreateAttributesInterface,
    TableInFront
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([

        ]);
    }

    public function getTableClass(): string
    {
        return UserTable::class;
    }

    public function livewireComponents(): LivewireAdditionalFunctions
    {
        return new LivewireFunctions([

        ]);
    }

    public function livewireOptionalDropDown(): LivewireDropOptional
    {
        return new LivewireDropOptional([

        ]);
    }
}
