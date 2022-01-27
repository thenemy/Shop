<?php

namespace App\Domain\User\Front\Dynamic;

use App\Domain\Core\Front\Admin\CustomTable\Traits\TableDynamic;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireComponents;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireOptionalDropDown;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireComponents;
use App\Domain\Core\Front\Js\Interfaces\FilterJsInterface;
use App\Domain\User\Entities\PlasticCardSurety;
use App\Domain\User\Front\Admin\CustomTable\Tables\PlasticDynamicTable;
use App\Domain\User\Front\Admin\Functions\SendSmsLivewire;
use App\Domain\User\Services\PlasticCardService;
use App\Domain\User\Services\PlasticCardSuretyService;

class SuretyPlasticCardDynamic extends PlasticCardSurety
{
    use TableDynamic;

    public static function getBaseService(): string
    {
        return PlasticCardSuretyService::class;
    }

    public function getActionsAttribute(): string
    {
        return $this->getRemoveButton()->generateHtml();
    }

    public function getCustomFrontRules(): array
    {
        return [
            'card_number' => fn($text) => $this->pan,
            'date_number' => fn($text) => $this->expiry,
            'code' => fn($text) => __("Подтвержден")
        ];
    }

    public static function setInputAttr($key, $type)
    {
        switch ($key) {
            case "card_number":
                switch ($type) {
                    case self::filter():
                        return FilterJsInterface::FORMAT_CARD_NUMBER;
                    case self::defer():
                        return true;
                }
            case "date_number":
                switch ($type) {
                    case self::filter():
                        return FilterJsInterface::FORMAT_DATE_FOR_CARD;
                    case self::defer():
                        return true;
                }
        }
    }


    public function getTitle(): string
    {
        return "Пластиковая карта";
    }

    public
    static function getDynamicParentKey(): string
    {
        return 'user_id';
    }

    public
    function getTableClass(): string
    {
        return PlasticDynamicTable::class;
    }

    public
    function livewireComponents(): LivewireComponents
    {
        return AllLivewireComponents::generation([
        ]);
    }

    public
    function livewireOptionalDropDown(): AllLivewireOptionalDropDown
    {
        return AllLivewireOptionalDropDown::generation([

        ]);
    }


    public
    function livewireFunctions(): LivewireAdditionalFunctions
    {
        return AllLivewireFunctions::generation([
            new SendSmsLivewire()
        ]);
    }

    public
    function getPrimaryKey(): string
    {
        return "id";
    }
}
