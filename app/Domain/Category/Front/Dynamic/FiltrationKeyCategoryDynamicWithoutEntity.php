<?php

namespace App\Domain\Category\Front\Dynamic;

use App\Domain\Category\Entities\FiltrationKeyCategory;
use App\Domain\Category\Front\Admin\CustomTable\Tables\FiltrationKeyCategoryTable;
use App\Domain\Category\Front\Admin\DropDown\FiltrationCategoryDropDown;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts\DynamicAttributes;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInFront;
use App\Domain\Core\Front\Admin\CustomTable\Traits\TableDynamicWithoutEntity;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireComponents;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireOptionalDropDown;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireComponents;

class FiltrationKeyCategoryDynamicWithoutEntity extends FiltrationKeyCategory implements TableInFront
{
    use TableDynamicWithoutEntity;

    public static function getCustomRules(): array
    {
        return [
            'key_ru' => DynamicAttributes::INPUT,
            "key_uz" => DynamicAttributes::INPUT,
            "key_en" => DynamicAttributes::INPUT,
        ];
    }

    public function getCustomFrontRules(): array
    {
        return [
            'key_ru' => null,
            "key_uz" => null,
            "key_en" => null,
        ];
    }

    static public function getPrefixInputHidden(): string
    {
        return "filtration";
    }

    public function livewireFunctions(): LivewireAdditionalFunctions
    {
        return AllLivewireFunctions::generation([

        ]);
    }

    public function getTitle(): string
    {
        return 'Фильтрация для продуктов';
    }

    public function getTableClass(): string
    {
        return FiltrationKeyCategoryTable::class;
    }

    public function livewireComponents(): LivewireComponents
    {
        return AllLivewireComponents::generation([]);
    }

    public function livewireOptionalDropDown(): AllLivewireOptionalDropDown
    {
        return AllLivewireOptionalDropDown::generation([]);
    }
}
