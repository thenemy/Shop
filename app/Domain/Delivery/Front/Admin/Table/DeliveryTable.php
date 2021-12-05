<?php

namespace App\Domain\Delivery\Front\Admin\Table;

use App\Domain\Core\Front\Admin\CustomTable\Abstracts\AbstractCreateTable;
use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;

class DeliveryTable extends AbstractCreateTable
{

    public function getRouteHandler(): RouteHandler
    {
        return;
    }

    public function getColumns(): array
    {
        // TODO: Implement getColumns() method.
    }
}
