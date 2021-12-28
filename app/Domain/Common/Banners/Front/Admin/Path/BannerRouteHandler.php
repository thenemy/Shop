<?php

namespace App\Domain\Common\Banners\Front\Admin\Path;

use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\Domain\Core\Front\Admin\Routes\Admin\AdminRoutesInterface;

class BannerRouteHandler extends RouteHandler
{

    protected function getName(): string
    {
        return AdminRoutesInterface::BANNER;
    }
}
