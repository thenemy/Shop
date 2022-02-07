<?php

namespace App\Domain\Product\Product\Front\Admin\Attributes;

use App\Domain\Core\File\Attribute\BaseComplex;
use App\Domain\Core\File\Interfaces\LivewireComplexInterface;
use App\Domain\Core\File\Models\Livewire\FileLivewireFactoring;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Product\Product\Front\Admin\Functions\HeaderTextFunction;
use App\Domain\Product\Product\Interfaces\ProductInterface;

class HeaderTextAttribute extends BaseComplex
{
    function getDefaultClassName(): string
    {
        return "ProductCreate";
    }

    function getTitle(): string
    {
        return "Характеристики";
    }

    function key(): string
    {
        return ProductInterface::HEADER_TEXT_SERVICE;
    }

    public function livewireFunctions(): LivewireAdditionalFunctions
    {
        return AllLivewireFunctions::generation([
            HeaderTextFunction::new()
        ]);
    }
}
