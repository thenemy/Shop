<?php

namespace App\Domain\Installment\Front\Nested;

use App\Domain\Core\Front\Admin\CustomTable\Actions\Base\AllActions;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\TextAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableFilterByInterface;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInFront;
use App\Domain\Core\Front\Admin\CustomTable\Traits\TableFilterBy;
use App\Domain\Core\Front\Admin\Form\Traits\AttributeGetVariable;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireComponents;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireOptionalDropDown;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireComponents;
use App\Domain\Core\Front\Admin\OpenButton\Interfaces\FilterInterface;
use App\Domain\Core\Main\Traits\ArrayHandle;
use App\Domain\Installment\Entities\TimeScheduleTransactions;
use App\Domain\Installment\Front\Admin\CustomTables\Tables\TimeScheduleTransactionTable;

class TimeScheduleTransactionIndex extends TimeScheduleTransactions implements TableInFront, FilterInterface, TableFilterByInterface
{
    use TableFilterBy, ArrayHandle, AttributeGetVariable;

    public function getTimeIndexAttribute()
    {
        return TextAttribute::generation($this, "created_at");
    }

    public function getDetailAttribute()
    {
        return TextAttribute::generation($this, "detail");
    }

    public function getKeyForFilter(): string
    {
        return "taken_credit_id";
    }

    function filterByData(): array
    {
        return [
            "taken_credit_id" => $this->getWithoutScopeAtrVariable("id")
        ];
    }

    public function getTableClass(): string
    {
        return TimeScheduleTransactionTable::class;
    }

    public function livewireComponents(): LivewireComponents
    {
        return AllLivewireComponents::generation([

        ]);
    }

    public function livewireOptionalDropDown(): AllLivewireOptionalDropDown
    {
        return AllLivewireOptionalDropDown::generation(
            [

            ]
        );
    }

    public function livewireFunctions(): LivewireAdditionalFunctions
    {
        return AllLivewireFunctions::generation(
            [

            ]
        );
    }

    public function getTitle(): string
    {
        return "";
    }

    public function getActionsAttribute(): string
    {
        return AllActions::generation([

        ]);
    }
}
