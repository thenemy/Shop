<?php

namespace App\Domain\Product\Product\Front\Admin\CustomTable\Tables;

use App\Domain\Core\Front\Admin\Attributes\Models\Column;
use App\Domain\Core\Front\Admin\CustomTable\Abstracts\AbstractCreateTable;
use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\Domain\Product\Product\Front\Admin\Path\ProductRouteHandler;

class ProductTable extends AbstractCreateTable
{

    public function getRouteHandler(): RouteHandler
    {
        return ProductRouteHandler::new();
    }

    public function getColumns(): array
    {
        return [
            Column::new(__("Название"), "name_index"),
            Column::new(__("Цена"), "price_index"),
            Column::new(__("Валюта"), "currency_index"),
            Column::new(__("Количество имееться"), "number_index"),
            Column::new(__("Магазин"), "shop_index"),
            Column::new(__("Категория"), "category_index"),
        ];
    }
}
