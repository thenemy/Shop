<?php

namespace App\Domain\Category\Front\Dynamic;

use App\Domain\Category\Front\Admin\CustomTable\Tables\FiltrationKeyCategoryTable;
use App\Domain\Category\Interfaces\CategoryRelationInterface;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts\DynamicAttributes;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInFront;
use App\Domain\Core\Front\Admin\CustomTable\Traits\TableDynamicWithoutEntity;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireComponents;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireOptionalDropDown;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireComponents;
use App\Domain\Product\ProductKey\Entities\ProductKey;
use App\Domain\Product\ProductKey\Front\Traits\TextDynamicWithoutEntity;

class FiltrationKeyCategoryDynamicWithoutEntity extends ProductKey implements TableInFront
{
    use TextDynamicWithoutEntity;


    static public function getPrefixInputHidden(): string
    {
        return CategoryRelationInterface::FILTER;
    }


    public function getTitle(): string
    {
        return 'Фильтрация для продуктов';
    }

    public function getTableClass(): string
    {
        return FiltrationKeyCategoryTable::class;
    }

}
