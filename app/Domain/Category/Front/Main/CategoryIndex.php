<?php

namespace App\Domain\Category\Front\Main;

use App\Domain\Category\Entities\Category;

use App\Domain\Category\Front\Admin\CustomTable\Action\Models\CategoryDeleteAction;
use App\Domain\Category\Front\Admin\CustomTable\Action\Models\CategoryEditAction;
use App\Domain\Category\Front\Admin\CustomTable\Tables\CategoryTable;
use App\Domain\Category\Front\Traits\CategoryAttributeTable;
use App\Domain\Core\File\Models\Livewire\FileLivewireCreator;
use App\Domain\Core\Front\Admin\CustomTable\Actions\Base\AllActions;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\TextAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInFront;
use App\Domain\Core\Front\Admin\DropDown\Models\Paginator\PaginatorDropDown;
use App\Domain\Core\Front\Admin\DropDown\OptionalItems\ActivateChooseItem;
use App\Domain\Core\Front\Admin\DropDown\OptionalItems\DeactivateChooseItem;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\LivewireDropOptional;


use App\Domain\Core\Front\Admin\Livewire\Functions\Base\LivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Core\Front\Interfaces\FrontEntityInterface;
use App\View\Components\Actions\DenyAction;


class CategoryIndex extends Category implements
    TableInFront, CreateAttributesInterface
{
    use  CategoryAttributeTable;

//    write all mutators required for table
//    add title for indexPage
//    addButton function and route to create new object
//    addFiltration which are required
//


    public function getNameTableAttribute(): string
    {
        return TextAttribute::preGenerate($this, "name");
    }

    // call function which will have set of actions for this table
    public function getActionTableAttribute(): string
    {
        return (new AllActions(
            [
                new CategoryEditAction([$this->id]),
                new CategoryDeleteAction([$this->id])
            ]
        ))->generateHtml();
    }

    static public function getFilter(): array
    {
        // must return filters which will be used
        return [];
    }

    /// this table will be shared to livewire where it will be initiated
    public function getTableClass(): string
    {
        return CategoryTable::class;
    }

    public function getTitle()
    {
        return "Категории";
    }

    public function livewireComponents(): LivewireAdditionalFunctions
    {
        return new LivewireFunctions([
            PaginatorDropDown::getDropDown()
        ]);
    }

    public function livewireOptionalDropDown(): LivewireDropOptional
    {
        return new LivewireDropOptional([
            ActivateChooseItem::create('status'),
            DeactivateChooseItem::create('status')
        ]);
    }

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            new FileLivewireCreator("Category", $this)
        ]);
    }
}
