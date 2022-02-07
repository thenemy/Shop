<?php

namespace App\Domain\Installment\Front\Nested;

use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInFront;
use App\Domain\Core\Front\Admin\CustomTable\Traits\TableFilterBy;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireComponents;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireOptionalDropDown;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireComponents;
use App\Domain\Installment\Entities\Transaction;
use App\Domain\Installment\Front\Admin\CustomTables\Tables\TransactionTable;

class TransactionIndex extends Transaction implements TableInFront
{
    use TableFilterBy;

    function filterByData(): array
    {
        return [
            "month_id" => "id"
        ];
    }

    public function livewireFunctions(): LivewireAdditionalFunctions
    {
        return  AllLivewireFunctions::generation([

        ]);
    }

    public function getActionsAttribute(): string
    {
        return  "";
    }

    public function getTableClass(): string
    {
        return TransactionTable::class;
    }

    public function livewireComponents(): LivewireComponents
    {
        return AllLivewireComponents::generation([

        ]);
    }

    public function livewireOptionalDropDown(): AllLivewireOptionalDropDown
    {
        return  AllLivewireOptionalDropDown::generation([

        ]);
    }

    public function getTitle(): string
    {
        return  "История платежей";
    }
}
