<?php

namespace App\Domain\Category\Front\Models;

use App\Domain\Category\Entities\Category;

use App\Domain\Category\Front\Admin\CustomTable\Action\Models\CategoryEditAction;
use App\Domain\Category\Front\Admin\CustomTable\Tables\CategoryTable;
use App\Domain\Category\Front\Traits\CategoryAttributeTable;
use App\Domain\Core\Front\Admin\CustomTable\Actions\Base\AllActions;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\TextAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInFront;
use App\Domain\Core\Front\Admin\DropDown\OptionalItems\ActivateChooseItem;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\LivewireDropOptional;


use App\Domain\Core\Front\Admin\Livewire\Functions\Base\LivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Interfaces\FrontEntityInterface;
use App\View\Components\Actions\DenyAction;


class CategoryIndex extends Category implements FrontEntityInterface, TableInFront
{
    use  CategoryAttributeTable;

//    write all mutators required for table
//    add title for indexPage
//    addButton function and route to create new object
//    addFiltration which are required
//

    public function getIconValueAttribute(): string
    {
        return "https://upload.wikimedia.org/wikipedia/commons/thumb/6/69/How_to_use_icon.svg/1200px-How_to_use_icon.svg.png";
    }

    public function getNameTableAttribute(): string
    {
        return TextAttribute::preGenerate($this, "name");
    }


    // call function which will have set of actions for this table
    public function getActionTableAttribute(): string
    {
        return (new AllActions(
            [
                new CategoryEditAction([$this->id])
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

    public function livewireComponents(): LivewireAdditionalFunctions
    {
        return new LivewireFunctions([
//            PaginatorDropDown::getDropDown()
        ]);
    }

    public function livewireOptionalDropDown(): LivewireDropOptional
    {
        return new LivewireDropOptional([
            new ActivateChooseItem()
        ]);
    }
}
