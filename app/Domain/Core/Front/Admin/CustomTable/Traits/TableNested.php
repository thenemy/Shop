<?php

namespace App\Domain\Core\Front\Admin\CustomTable\Traits;

use App\Domain\Core\Front\Admin\Button\ModelInRunTime\ButtonGreenLivewire;
use App\Domain\Core\Front\Admin\Button\ModelInRunTime\ButtonRedLivewire;
use App\Domain\Core\Front\Admin\DropDown\OptionalItems\ActivateChooseItem;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\LivewireDropOptional;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\LivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;

trait TableNested
{
    public string $key_to_attach;
    public string $title_for_table;
    public string $key_to_filter;

    static public function generate($key_to_attach, $title_for_table, $key_to_filter)
    {
        $new = new self();
        $new->key_to_attach = $key_to_attach;
        $new->title_for_table = $title_for_table;
        $new->key_to_filter = $key_to_filter;
        return $new;
    }

    abstract public function getTableClass(): string;

    abstract public function tableDeclineClass(): string;

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

    public function liviwireOptionalDropDownAccept(): LivewireDropOptional
    {
        return new LivewireDropOptional([

        ]);
    }

    public function liviwireOptionalDropDownDecline(): LivewireDropOptional
    {
        return new LivewireDropOptional([

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
