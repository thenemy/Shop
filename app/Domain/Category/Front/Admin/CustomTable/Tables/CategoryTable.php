<?php


namespace App\Domain\Category\Front\Admin\CustomTable\Tables;


use App\Domain\Category\Front\Admin\CustomTable\Attributes\CategoryAttributes;
use App\Domain\Core\Front\Admin\CustomTable\Abstracts\AbstractTable;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts\AbstractAttributes;

class CategoryTable extends AbstractTable
{

    public function getNameOfColumns(): array
    {
        return [
            __("Иконка"),
            __("Названия"),
            __("Действия")
        ];
    }

    public function getRows($item): AbstractAttributes
    {
        return new CategoryAttributes($item->id);
    }
}
