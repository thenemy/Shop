<?php

namespace App\Domain\User\Front\Admin\CustomTable\Tables;

use App\Domain\Core\Front\Admin\Attributes\Models\Column;
use App\Domain\Core\Front\Admin\CustomTable\Abstracts\AbstractCreateTable;
use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\Domain\User\Front\Admin\Path\UserRouteHandler;

class UserTable extends AbstractCreateTable
{

    public function getRouteHandler(): RouteHandler
    {
        return UserRouteHandler::new();
    }

    public function getColumns(): array
    {
        return  [
            new Column("")
        ];
    }
}
