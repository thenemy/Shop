<?php


namespace App\Domain\Category\Front\Admin\CustomTable\Tables;


use App\Domain\Category\Front\Admin\CustomTable\Attributes\CategoryAttributes;
use App\Domain\Category\Front\Admin\CustomTable\Traits\CommonCategoryTable;
use App\Domain\Core\Front\Admin\Attributes\Models\Column;
use App\Domain\Core\Front\Admin\CustomTable\Abstracts\AbstractTable;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts\AbstractAttributes;

// only this is needed
class CategoryTable extends AbstractTable
{
    use CommonCategoryTable;

    public function getColumns(): array
    {
        return [
            ...$this->getCommonColumns(),
            new Column(__("Действия"), "action_table"),
        ];
    }

}
