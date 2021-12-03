<?php

namespace App\Domain\User\Front\Main;

use App\Domain\Core\File\Models\Livewire\FileLivewireCreator;
use App\Domain\Core\Front\Admin\CustomTable\Actions\Base\AllActions;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\TextAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInFront;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\LivewireDropOptional;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\LivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Core\Front\Interfaces\FrontEntityInterface;
use App\Domain\User\Entities\User;
use App\Domain\User\Front\Admin\CustomTable\Action\UserEditAction;
use App\Domain\User\Front\Admin\CustomTable\Tables\UserTable;

class UserIndex extends User implements
    CreateAttributesInterface,
    TableInFront
{

    public function getDataIndexAttribute(): string
    {
        return TextAttribute::preGenerate($this, "created_at");
    }

    public function getNameIndexAttribute(): string
    {
        return TextAttribute::preGenerate($this, 'name');
    }

    public function getPhoneIndexAttribute(): string
    {
        return TextAttribute::preGenerate($this, "phone");
    }

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            new FileLivewireCreator("User", $this)
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


    public function getActionsAttribute(): string
    {
        return AllActions::new([
            UserEditAction::new($this->id)
        ]);
    }

    public function getTitle(): string
    {
        return "Пользователи";
    }
}
