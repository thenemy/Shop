<?php

namespace App\Domain\Category\Front\All;

use App\Domain\Category\Entities\Category;
use App\Domain\Category\Front\Admin\CustomTable\Tables\AllCategoryTable;
use App\Domain\Category\Front\Traits\CategoryAttributeTable;
use App\Domain\Core\File\Models\Livewire\FileLivewireCreator;
use App\Domain\Core\Front\Admin\CustomTable\Actions\Base\AllActions;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInFront;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireComponents;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireOptionalDropDown;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireComponents;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;

class AllCategoryIndex extends Category implements TableInFront, CreateAttributesInterface
{
    use CategoryAttributeTable;

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            new FileLivewireCreator($this->class_name, $this)
        ]);
    }

    public function getTableClass(): string
    {
        return AllCategoryTable::class;
    }

    public function livewireComponents(): LivewireComponents
    {
        return AllLivewireComponents::generation([

        ]);
    }

    public function livewireOptionalDropDown(): AllLivewireOptionalDropDown
    {
        return AllLivewireOptionalDropDown::generation([

        ]);
    }

    public function livewireFunctions(): LivewireAdditionalFunctions
    {
        return AllLivewireFunctions::generation([

        ]);
    }

    public function getTitle(): string
    {
        return "Все категории";
    }

    public function getActionsAttribute(): string
    {
        return AllActions::generation([

        ]);
    }
}
