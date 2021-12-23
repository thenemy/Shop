<?php

namespace App\Domain\User\Front\Dynamic;

use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInFront;
use App\Domain\Core\Front\Admin\CustomTable\Traits\TableDynamic;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireOptionalDropDown;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireComponents;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireComponents;
use App\Domain\User\Entities\PlasticCard;
use App\Domain\User\Front\Admin\CustomTable\Tables\PlasticDynamicTable;
use App\Domain\User\Front\Admin\Functions\SendSmsLivewire;
use App\Domain\User\Services\PlasticCardService;

class PlasticCardDynamic extends PlasticCard implements TableInFront
{
    use TableDynamic;

    public function getTitle(): string
    {
        return "Пластиковая карта";
    }

    public static function getDynamicParentKey(): string
    {
        return 'user_id';
    }

    public function getTableClass(): string
    {
        return PlasticDynamicTable::class;
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

    public static function getBaseService(): string
    {
        return PlasticCardService::class;
    }

    public function livewireFunctions(): LivewireAdditionalFunctions
    {
        return AllLivewireFunctions::generation([
            new SendSmsLivewire()
        ]);
    }

    public function getPrimaryKey(): string
    {
        return "id";
    }
}
