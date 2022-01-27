<?php

namespace App\Domain\Installment\Front\Nested;

use App\Domain\Core\Front\Admin\CustomTable\Actions\Base\AllActions;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\ContainerTextAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\StatusAttribute;
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
use App\Domain\Installment\Entities\MonthPaid;
use App\Domain\Installment\Front\Admin\CustomTables\Tables\MonthlyPaidTable;
use App\Domain\Installment\Front\Admin\Functions\SmsNotPayment;

class MonthlyPaidIndex extends MonthPaid implements TableInFront, FilterInterface, TableFilterByInterface
{
    use TableFilterBy, ArrayHandle, AttributeGetVariable;

    public function getMonthIndexAttribute()
    {
        dd($this->month->month);
        if ($this->month)
            return TextAttribute::generation($this, self::DB_TO_FRONT[$this->month->month], true);
        return  "";
    }

    public function getPaidIndexAttribute()
    {
        return TextAttribute::generation($this, sprintf("%s/%s", $this->must_pay, $this->paid), true);
    }

    public function getStatusIndexAttribute()
    {
        $class = "bg-green-400";
        $text = "Оплачено";
        if ($this->paid != $this->month) {
            $class = "bg-red-400";
            $text = "Не оплачено";
        }
        return ContainerTextAttribute::generation(
            $class,
            new TextAttribute(
                $this,
                $text,
                true));
    }


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
            new SmsNotPayment()
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
}
