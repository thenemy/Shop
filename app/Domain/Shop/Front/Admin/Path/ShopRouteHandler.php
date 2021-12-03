<?php

namespace App\Domain\Shop\Front\Admin\Path;

use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\Domain\Core\Front\Admin\Routes\Admin\AdminRoutesInterface;
use App\Domain\Core\Front\Admin\Routes\Interfaces\RoutesInterface;
use App\View\Helper\Sidebar\Path\AdminRouteHandler;

class ShopRouteHandler extends RouteHandler
{

    protected function getName(): string
    {
        return AdminRoutesInterface::SHOP;
    }
}
