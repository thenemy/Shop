<?php

namespace App\Domain\Category\Front\Models;

use App\Domain\Category\Entities\Category;

use App\Domain\Category\Front\Admin\CustomTable\Action\Models\CategoryAcceptAction;
use App\Domain\Core\Front\Admin\CustomTable\Actions\Base\AllActions;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\IconsAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\ImageAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\StatusAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\TextAttribute;
use App\Domain\Core\Front\Admin\DropDown\Models\Paginator\PaginatorDropDown;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\LivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Interfaces\FrontEntityInterface;
use App\View\Components\Actions\DenyAction;


class CategoryIndex extends Category implements FrontEntityInterface
{

//    write all mutators required for table
//    add title for indexPage
//    addButton function and route to create new object
//    addFiltration which are required
//
    public function getIconTableAttribute(): string
    {
        return ImageAttribute::preGenerate($this, 'icon_value');
    }

    public function getIconValueAttribute(): string
    {
        return "https://upload.wikimedia.org/wikipedia/commons/thumb/6/69/How_to_use_icon.svg/1200px-How_to_use_icon.svg.png";
    }

    public function getNameTableAttribute(): string
    {
        return TextAttribute::preGenerate($this, "name");
    }

    public function getStatusTableAttribute(): string
    {
        return '';
//        return StatusAttribute::preGenerate($this, "statusName");
    }

    static public function getFilter(): array
    {
        // must return filters which will be used
        return [];
    }


    public function livewireComponents(): LivewireAdditionalFunctions
    {
        return new LivewireFunctions([
            PaginatorDropDown::getDropDown()
        ]);
    }

    // get Open button with all required data
    public function getUnderCategoryTableAttribute()
    {
        return TextAttribute::preGenerate($this, "name");
    }

    // call function which will have set of actions for this table
    public function getActionTableAttribute(): string
    {
        return IconsAttribute::preGenerate($this, 'name');
//        return (new AllActions([
//              new CategoryAcceptAction(),
//              new DenyAction(),
//              new AcceptAction(),
//              new DeleteAction(),
//              new EditAction(),
//              new ViewAction()
//        ]))->generateHtml();
    }


//
//
//    static public function getColumns(): array
//    {
//        return [];
//    }


}
