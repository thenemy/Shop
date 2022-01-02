<?php

namespace App\Domain\CreditProduct\Front\Admin\Path;

use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\Domain\Core\Front\Admin\Routes\Admin\AdminRoutesInterface;

class MainCreditRouteHandler extends RouteHandler
{

    protected function getName(): string
    {
        return AdminRoutesInterface::MAIN_CREDIT;
    }
}
