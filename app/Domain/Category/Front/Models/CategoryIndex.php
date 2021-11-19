<?php

namespace App\Domain\Category\Front\Models;

use App\Domain\Category\Entities\Category;
use App\Domain\Category\Entities\IconCat;
use App\Domain\Core\Front\Admin\Attributes\Models\Column;
use App\Domain\Core\Front\Admin\Attributes\Models\Row;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\ImageAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\StatusAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\TextAttribute;
use App\Domain\Core\Front\Admin\Routes\Interfaces\RoutesInterface;
use App\Domain\Core\Front\Interfaces\FrontEntityInterface;
use App\Domain\Core\Front\Traits\ProvideService;


class CategoryIndex extends Category
{

//    write all mutators required for table
//    add title for indexPage
//    addButton function and route to create new object
//    addFiltration which are required
//
    public function getIconImageAttribute(): string
    {
        return ImageAttribute::preGenerate($this, "icon");
    }

    public function getNameTableAttribute(): string
    {
        return TextAttribute::preGenerate($this, "text");
    }

    public function getStatusTableAttribute(): string
    {
        return "";
    }

    static public function getFilter(): array
    {
        // must return filters which will be used
        return [];
    }

    // not neccessary because mutators will be created
    static public function getTableRows(): array
    {
        return [
            'icon_image' => ImageAttribute::class,
            "name" => TextAttribute::class,
            "status" => StatusAttribute::class,
            "under_category" => true,
            "action" => true,
        ];
    }

    public function livewireComponents(): array
    {
        return [];
    }

    // get Open button with all required data
    public function getUnderCategoryAttribute()
    {

    }

    // call function which will have set of actions for this table
    public function getActionAttribute()
    {

    }



    static public function getTitles(): array
    {
        return [
            RoutesInterface::INDEX => "",
            RoutesInterface::CREATE => "",
            RoutesInterface::EDIT => "",
        ];
    }

//
//
//    static public function getColumns(): array
//    {
//        return [];
//    }


}
