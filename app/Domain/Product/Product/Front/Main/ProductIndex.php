<?php

namespace App\Domain\Product\Product\Front\Main;

use App\Domain\Core\File\Models\Livewire\FileLivewireCreator;
use App\Domain\Core\File\Models\Main\FileBladeCreatorIndex;
use App\Domain\Core\Front\Admin\CustomTable\Actions\Base\AllActions;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Attributes\TextAttribute;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Interfaces\AttributeInterface;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInFront;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\LivewireDropOptional;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\LivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Product\Product\Entities\Product;
use App\Domain\Product\Product\Front\Admin\CustomTable\Actions\ProductDeleteAction;
use App\Domain\Product\Product\Front\Admin\CustomTable\Actions\ProductEditAction;
use App\Domain\Product\Product\Front\Admin\CustomTable\Tables\ProductTable;

class ProductIndex extends Product implements TableInFront, CreateAttributesInterface
{
    public function getCurrencyIndexAttribute(): string
    {
        return TextAttribute::preGenerate($this, self::DB_TO_TEXT[$this->currency], true);
    }

    public function getNumberIndexAttribute(): string
    {
        return TextAttribute::preGenerate($this, "number");
    }

    public function getShopIndexAttribute(): string
    {
        return TextAttribute::preGenerate($this, $this->shop->name, true);
    }

    public function getCategoryIndexAttribute(): string
    {
        return TextAttribute::preGenerate($this, $this->category->name, true);
    }

    public function getNameIndexAttribute(): string
    {
        return TextAttribute::preGenerate($this, 'title');
    }

    public function getPriceIndexAttribute(): string
    {
        return TextAttribute::preGenerate($this, "price");
    }

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            new FileLivewireCreator("Product", $this),
        ]);
    }

    public function getTableClass(): string
    {
        return ProductTable::class;
    }

    public function livewireComponents(): LivewireAdditionalFunctions
    {
        return LivewireFunctions::new([

        ]);
    }

    public function livewireOptionalDropDown(): LivewireDropOptional
    {
        return LivewireDropOptional::new([

        ]);
    }

    public function getTitle(): string
    {
        return "Товары";
    }

    public function getActionsAttribute(): string
    {
        return AllActions::new([
            ProductEditAction::new([$this->id]),
            ProductDeleteAction::new([$this->id]),
        ]);
    }
}
