<?php

namespace App\Domain\Category\Front\Admin\CustomTable\Action\Models;

use App\Domain\Core\Front\Admin\CustomTable\Actions\Abstracts\EditActionAbstract;
use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\Domain\Core\Front\Admin\Routes\Models\CategoryRouteHandler;

class CategoryEditAction extends EditActionAbstract
{

    public function getRouteHandler(): RouteHandler
    {
        return new CategoryRouteHandler();
    }
}
