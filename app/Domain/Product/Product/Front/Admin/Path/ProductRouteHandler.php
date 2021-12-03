<?php

namespace App\Domain\Product\Product\Front\Admin\Path;

use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\Domain\Core\Front\Admin\Routes\Admin\AdminRoutesInterface;

class ProductRouteHandler extends RouteHandler
{

    protected function getName(): string
    {
        return AdminRoutesInterface::PRODUCT;
    }
}
