<?php

namespace App\Domain\Core\Front\Admin\CustomTable\Traits;

use App\Domain\Core\Front\Admin\Button\ModelInRunTime\ButtonGreenLivewire;
use App\Domain\Core\Front\Admin\Button\ModelInRunTime\ButtonRedLivewire;
use App\Domain\Core\Front\Admin\DropDown\OptionalItems\ActivateChooseItem;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireOptionalDropDown;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireComponents;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireComponents;

trait TableNested
{
    // the method which will be called to detach or attach the objects
    // get to arguments one is actual id could be the array of id or just id
    // and second  the status (true is attach , false detach)
    public string $key_to_attach;

    public string $title_for_table;
//    this is required for filtering data in nested component
//    so we get all records that belongs to parent
//   filterBy = [ $key_to_filter => parent_id ]
    public string $key_to_filter;

    static public function generate($key_to_attach, $title_for_table, $key_to_filter)
    {
        $new = new self();
        $new->key_to_attach = $key_to_attach;
        $new->title_for_table = $title_for_table;
        $new->key_to_filter = $key_to_filter;
        return $new;
    }

    static public function generateWithoutEntity($key_to_attach, $title_for_table)
    {
        $new = new self();
        $new->key_to_attach = $key_to_attach;
        $new->title_for_table = $title_for_table;
        return $new;
    }

    abstract public function getTableClass(): string;

    abstract public function tableDeclineClass(): string;

    public function livewireComponents(): LivewireComponents
    {
        return new AllLivewireComponents([
        ]);
    }


    /// accept drop down
    public function livewireOptionalDropDown(): AllLivewireOptionalDropDown
    {
        return new AllLivewireOptionalDropDown([
            ActivateChooseItem::create("status")
        ]);
    }


    public function liviwireOptionalDropDownDecline(): AllLivewireOptionalDropDown
    {
        return new AllLivewireOptionalDropDown([

        ]);
    }

    public function livewireFunctions(): LivewireAdditionalFunctions
    {
        return AllLivewireFunctions::generation([

        ]);
    }
    public function getDeclineButtonAttribute(): string
    {
        return (new ButtonRedLivewire(__("Удалить"),
            "removeSpecific(" . $this->id . ")"))->generateHtml();
    }

    public function getAcceptButtonAttribute(): string
    {
        return (new ButtonGreenLivewire(__("Добавить"),
            "addSpecific(" . $this->id . ")"))->generateHtml();
    }
}
