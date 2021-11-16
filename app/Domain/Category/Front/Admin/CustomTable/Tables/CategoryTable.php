<?php


namespace App\Domain\Category\Front\Admin\CustomTable\Tables;


use App\Domain\Category\Front\Admin\CustomTable\Attributes\CategoryAttributes;
use App\Domain\Core\Front\Admin\Attributes\Models\Column;
use App\Domain\Core\Front\Admin\CustomTable\Abstracts\AbstractTable;
use App\Domain\Core\Front\Admin\CustomTable\Attributes\Abstracts\AbstractAttributes;

class CategoryTable extends AbstractTable
{
    public function getColumns(): array
    {
        return [
            new Column(__("Иконка"), "icon_table"),
            new Column(__("Название"), "name_table"),
            new Column(__("Статус"), 'status_table'),
            new Column(__("Под категории"), "under_category_table"),
            new Column(__("Действия"), "action_table"),
        ];
    }

}
