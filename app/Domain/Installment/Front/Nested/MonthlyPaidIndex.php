<?php

namespace App\Domain\Installment\Front\Nested;

use App\Domain\Core\Front\Admin\CustomTable\Actions\Base\AllActions;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableFilterByInterface;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInFront;
use App\Domain\Core\Front\Admin\CustomTable\Traits\TableFilterBy;
use App\Domain\Core\Front\Admin\Form\Traits\AttributeGetVariable;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireComponents;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireOptionalDropDown;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireComponents;
use App\Domain\Core\Front\Admin\OpenButton\Interfaces\OpenEntity;
use App\Domain\Core\Main\Traits\ArrayHandle;
use App\Domain\Installment\Entities\MonthPaid;
use App\Domain\Installment\Front\Admin\CustomTables\Tables\MonthlyPaidTable;

class MonthlyPaidIndex extends MonthPaid implements TableInFront, OpenEntity, TableFilterByInterface
{
    use TableFilterBy, ArrayHandle, AttributeGetVariable;

    public function getTableClass(): string
    {
        return MonthlyPaidTable::class;
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
        return "";
    }

    public function getActionsAttribute(): string
    {
        return AllActions::generation([]);
    }

    public function getKeyForFilter()
    {
        return "taken_credit_id";
    }

    function filterByData(): array
    {
        return [
            "taken_credit_id" => $this->getAttributeVariable("id")
        ];
    }
}
