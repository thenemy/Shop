<?php


namespace App\Domain\Category\Front\Admin\CustomTable\Action\Models;


use App\Domain\Core\Front\Admin\CustomTable\Actions\Abstracts\AcceptActionAbstract;
use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\Domain\Core\Front\Admin\Routes\Admin\AdminRoutesInterface;

class CategoryAcceptAction extends AcceptActionAbstract
{

    public function routeName()
    {
        return AdminRoutesInterface::CATEGORY;
    }

    public function getRouteHandler(): RouteHandler
    {
        return new CategoryRouteHandler();
    }
}
