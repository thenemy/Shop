<?php

namespace App\Domain\Category\Front\Opened;

use App\Domain\Category\Front\Main\CategoryIndex;
use App\Domain\Core\File\Models\Livewire\FileLivewireCreatorWithFilterBy;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableFilterByInterface;
use App\Domain\Core\Front\Admin\CustomTable\Traits\TableFilterBy;
use App\Domain\Core\Front\Admin\OpenButton\Interfaces\OpenEntity;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Core\Main\Traits\ArrayHandle;

// all names will be taken from this table
class CategoryOpen extends CategoryIndex implements OpenEntity, TableFilterByInterface
{
    use TableFilterBy, ArrayHandle;

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            new FileLivewireCreatorWithFilterBy($this->class_name, $this)
        ]);
    }

    public function getTitle(): string
    {
        return "Под категория";
    }

    public function getKeyForFilter(): string
    {
        return "parent_id";
    }

    public function filterByData(): array
    {
        return [
            "parent_id" => '$params'
        ];
    }
}
