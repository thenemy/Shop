<?php

namespace App\Domain\Category\Front\Dynamic;

use App\Domain\Category\Entities\FiltrationCategory;
use App\Domain\Category\Front\Admin\CustomTable\Tables\FiltrationCategoryTable;
use App\Domain\Category\Front\Admin\DropDown\FiltrationCategoryDropDown;
use App\Domain\Category\Services\FiltrationCategoryService;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts\DynamicAttributes;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\InputTableAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\TextAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInFront;
use App\Domain\Core\Front\Admin\CustomTable\Traits\TableDynamic;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireComponents;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireOptionalDropDown;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireComponents;

class FiltrationCategoryDynamic extends FiltrationCategoryDynamicWithoutEntity
{
    use TableDynamic;

    public static function getBaseService(): string
    {
        return FiltrationCategoryService::class;
    }

    public static function getDynamicParentKey(): string
    {
        return 'category_id';
    }
}
