<?php

namespace App\Domain\Shop\Front\Dynamic;

use App\Domain\Core\Front\Admin\CustomTable\Actions\Base\AllActions;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts\DynamicAttributes;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInFront;
use App\Domain\Core\Front\Admin\CustomTable\Traits\TableDynamic;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireComponents;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireOptionalDropDown;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireComponents;
use App\Domain\Shop\Entities\WorkTimes;
use App\Domain\Shop\Front\Admin\CustomTable\Tables\WorkTimesDynamicTable;
use App\Domain\Shop\Front\Admin\DropDown\DayDropDown;
use App\Domain\Shop\Services\WorkTimesService;

class WorkTimesDynamic extends WorkTimes implements TableInFront
{
    use TableDynamic;

    public static function getCustomRules(): array
    {
        return [
            "day" => DynamicAttributes::DROP_DOWN(DayDropDown::class),
            "workTimeFrom" => DynamicAttributes::INPUT("number"),
            "workTimeTo" => DynamicAttributes::INPUT("number")
        ];
    }

    public function getTableClass(): string
    {
        return WorkTimesDynamicTable::class;
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
        return "Дни работы";
    }

    public function getActionsAttribute(): string
    {
        return AllActions::generation([

        ]);
    }

    public static function getBaseService(): string
    {
        return WorkTimesService::class;
    }

    public static function getDynamicParentKey(): string
    {
        return "id";
    }
}
