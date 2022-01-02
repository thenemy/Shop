<?php

namespace App\Domain\Category\Front\Admin\Path;

use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\Domain\Core\Front\Admin\Routes\Admin\AdminRoutesInterface;

class CategoryRouteHandler extends RouteHandler
{

    protected function getName(): string
    {
        return AdminRoutesInterface::CATEGORY;
    }
}
