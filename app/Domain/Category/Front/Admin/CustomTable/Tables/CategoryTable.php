<?php


namespace App\Domain\Category\Front\Admin\CustomTable\Tables;


use App\Domain\Category\Front\Admin\CustomTable\Traits\CommonCategoryTable;
use App\Domain\Category\Front\Admin\Path\CategoryRouteHandler;
use App\Domain\Core\Front\Admin\Attributes\Models\Column;
use App\Domain\Core\Front\Admin\CustomTable\Abstracts\AbstractCreateTable;
use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;

// only this is needed
class CategoryTable extends AbstractCreateTable
{
    use CommonCategoryTable;

    public function getColumns(): array
    {
        return [
            ...$this->getCommonColumns(),
            new Column(__("Действия"), "action_table"),
        ];
    }

    public function getRouteHandler(): RouteHandler
    {
        return CategoryRouteHandler::new();
    }
}
