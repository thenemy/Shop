<?php

namespace App\View\Helper\Sidebar\Path;

use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\Domain\Core\Front\Admin\Routes\Admin\AdminRoutesInterface;

class AdminRouteHandler extends RouteHandler
{

    protected function getName(): string
    {
        return AdminRoutesInterface::ADMIN;
    }
}
