<?php

namespace App\Domain\Category\Front\Admin\CustomTable\Action\Models;

use App\Domain\Core\Front\Admin\CustomTable\Actions\Abstracts\AcceptActionAbstract;
use App\Domain\Core\Front\Admin\CustomTable\Actions\Abstracts\DeleteActionAbstract;
use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\Domain\Core\Front\Admin\Routes\Models\CategoryRouteHandler;

class CategoryDeleteAction extends DeleteActionAbstract
{

    public function getRouteHandler(): RouteHandler
    {
        return new CategoryRouteHandler();
    }
}
