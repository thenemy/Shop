<?php

namespace App\Domain\Installment\Front\Admin\CustomTables\Tables;

use App\Domain\Core\Front\Admin\Attributes\Models\Column;
use App\Domain\Core\Front\Admin\Attributes\Models\LivewireStatusColumn;
use App\Domain\Core\Front\Admin\CustomTable\Abstracts\AbstractCreateTable;
use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\Domain\Installment\Front\Admin\Path\TakenCreditRouteHandler;

class TakenCreditTable extends AbstractCreateTable
{

    public function getRouteHandler(): RouteHandler
    {
        return TakenCreditRouteHandler::new();
    }

    public function getColumns(): array
    {
        return [
            new Column(__("ID заказа"), "id_purchase"),
            new Column(__("Cумма оплаты"), "all_sum_index"),
            new Column(__("Количество товара"), "num_product_index"),
            new Column(__("Ф.И.О"), "client_index"),
            new Column(__("Номер телефона"), "phone_index"),
            new Column(__("Дата создания"), "date_creation_index"),
            new Column(__("Дата начало рассрочки"), "date_approval_index"),
            new Column(__("Дата окончания рассрочки"), "date_finish_index"),
//            new LivewireStatusColumn(__("Статус"), "status_index", "status_handle")
        ];
    }
}
