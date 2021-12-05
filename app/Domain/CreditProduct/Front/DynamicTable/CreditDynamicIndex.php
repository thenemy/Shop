<?php

namespace App\Domain\CreditProduct\Front\DynamicTable;

use App\Domain\Core\File\Models\Livewire\FileLivewireDynamic;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInFront;
use App\Domain\Core\Front\Admin\CustomTable\Traits\TableDynamic;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\LivewireDropOptional;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\LivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\CreditProduct\Entity\Credit;
use App\Domain\CreditProduct\Front\Admin\Table\CreditDynamicTable;
use App\Domain\CreditProduct\Services\CreditService;

class CreditDynamicIndex extends Credit implements TableInFront
{
    use TableDynamic;

    public function getTableClass(): string
    {
        return CreditDynamicTable::class;
    }

    public function livewireComponents(): LivewireAdditionalFunctions
    {
        return LivewireFunctions::new([

        ]);
    }

    public function livewireOptionalDropDown(): LivewireDropOptional
    {
        return LivewireDropOptional::new([

            ]
        );
    }

    /**
     *
     */
    public function getTitle(): string
    {
        return "Кредиты на каждый месяц";
    }

    public static function getDynamicParentKey(): string
    {
        return "main_credit_id";
    }
}
