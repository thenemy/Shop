<?php

namespace App\Domain\CreditProduct\Front\Admin\Table;

use App\Domain\Core\Front\Admin\Attributes\Models\Column;
use App\Domain\Core\Front\Admin\CustomTable\Abstracts\AbstractCreateTable;
use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\Domain\CreditProduct\Front\Admin\Path\MainCreditRouteHandler;

class MainCreditTable extends AbstractCreateTable
{

    public function getRouteHandler(): RouteHandler
    {
        return MainCreditRouteHandler::new();
    }

    public function getColumns(): array
    {
        return [
            Column::new(__("Название"), "name_index"),
            Column::new(__("Изночальная ставка"), "initial_price_index"),
            Column::new(__("Месяцы"), "initial_month_index"),
        ];
    }
}
