<?php

namespace App\Domain\Category\Front\Admin\CustomTable\Traits;

use App\Domain\Core\Front\Admin\Attributes\Models\Column;

trait CommonCategoryTable
{
    public function getCommonColumns(): array
    {
        return [
            new Column(__("Иконка"), "icon_table"),
            new Column(__("Название"), "name_table"),
            new Column(__("Статус"), 'status_table'),
            new Column(__("Подкатегории"), "under_category_table"),
        ];
    }
}
