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
use App\Domain\Core\Main\Interfaces\FrontInterface;
use App\Domain\Core\Media\Traits\MediaTrait;

class CategoryIndex extends Category implements FrontInterface
{

//    write all mutators required for table
//    add title for indexPage
//    addButton function and route to create new object
//    addFiltration which are required
//
    public function getIconImageAttribute(): string
    {
        return (new ImageAttribute($this, 'icon'))->generateHtml();
    }

    public function getNameTableAttribute()
    {
        return new TextAttribute($this, "text");
    }

    public function getStatusTableAttribute()
    {
        return "";
    }

    static public function getFilter(): array
    {
        // must return filters which will be used
        return;
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
        // TODO: Implement livewireComponents() method.
    }

    // get Open button with all required data
    public function getUnderCategoryAttribute()
    {

    }

    // call function which will have set of actions for this table
    public function getActionAttribute()
    {

    }


    // move somewhere else
    public function setIconImageAttribute($value)
    {
        if ($this->icon) {
            $this->icon->icon = $value;
            $this->icon->save();
        } else {
            $icon = new IconCat();
            $icon->category()->associate($this->id);
            $icon->icon = $value;
            $icon->save();
        }
    }

    static public function getTitles(): array
    {
        return [
            RoutesInterface::INDEX => "",
            RoutesInterface::CREATE => "",
            RoutesInterface::EDIT => "",
        ];
    }


    static public function getColumns(): array
    {
        // TODO: Implement getColumns() method.
    }
}
