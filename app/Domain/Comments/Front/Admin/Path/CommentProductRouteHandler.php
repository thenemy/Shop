<?php

namespace App\Domain\Comments\Front\Admin\Path;

use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\Domain\Core\Front\Admin\Routes\Admin\AdminRoutesInterface;

class CommentProductRouteHandler extends RouteHandler
{

    protected function getName(): string
    {
        return  AdminRoutesInterface::COMMENT_PRODUCT;
    }
}
