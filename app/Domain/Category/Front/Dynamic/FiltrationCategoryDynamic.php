<?php

namespace App\Domain\Category\Front\Dynamic;

use App\Domain\Category\Entities\FiltrationCategory;
use App\Domain\Category\Front\Admin\CustomTable\Tables\FiltrationCategoryTable;
use App\Domain\Category\Front\Admin\DropDown\FiltrationCategoryDropDown;
use App\Domain\Category\Services\FiltrationCategoryService;
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

class FiltrationCategoryDynamic extends FiltrationCategory implements TableInFront
{
    use TableDynamic;


    protected function generateInput()
    {
        $this->inputs['key'] = InputTableAttribute::generate(
            'key',
            'text',
            $this->fillCollectionModel('key')
        );
        $this->inputs['attribute'] = FiltrationCategoryDropDown::generate(
            $this->fillCollectionModel(''),
            'attribute',
        );
    }

    protected function generateAttributes()
    {
        $this->front_attribute['key'] = TextAttribute::generation(
            $this,
            'key'
        );
        $this->front_attribute['attribute'] = TextAttribute::generation(
            $this,
            self::DB_TO_FRONT[$this->attribute],
            true
        );
    }

    public function getTitle(): string
    {
        return 'Фильтрация для продуктов';
    }

    public static function getBaseService(): string
    {
        return FiltrationCategoryService::class;
    }

    public static function getDynamicParentKey(): string
    {
        return 'category_id';
    }

    public function getTableClass(): string
    {
        return FiltrationCategoryTable::class;
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

    public function getPrimaryKey(): string
    {
        return $this->primaryKey;
    }
}
