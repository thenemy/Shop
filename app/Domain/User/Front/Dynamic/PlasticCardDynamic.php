<?php

namespace App\Domain\User\Front\Dynamic;

use App\Domain\Core\Front\Admin\CustomTable\Actions\Base\AllActions;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInFront;
use App\Domain\Core\Front\Admin\CustomTable\Traits\TableDynamic;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireOptionalDropDown;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireComponents;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireComponents;
use App\Domain\Core\Front\Js\Interfaces\FilterJsInterface;
use App\Domain\User\Entities\PlasticCard;
use App\Domain\User\Front\Admin\CustomTable\Tables\PlasticDynamicTable;
use App\Domain\User\Front\Admin\Functions\SendSmsLivewire;
use App\Domain\User\Services\PlasticCardService;

class PlasticCardDynamic extends PlasticCard implements TableInFront
{
    use \App\Domain\User\Front\Traits\PlasticCardDynamic;

    public
    static function getBaseService(): string
    {
        return PlasticCardService::class;
    }
    public
    function getTableClass(): string
    {
        return PlasticDynamicTable::class;
    }



    public
    function getPrimaryKey(): string
    {
        return "id";
    }
}
