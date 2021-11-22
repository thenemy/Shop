<?php


namespace App\Domain\Category\Front\Admin\CustomTable\Action\Models;


use App\Domain\Core\Front\Admin\CustomTable\Actions\Abstracts\AcceptActionAbstract;
use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\Domain\Core\Front\Admin\Routes\Models\CategoryRouteHandler;


class CategoryAcceptAction extends AcceptActionAbstract
{


    public function getRouteHandler():RouteHandler
    {
        return new CategoryRouteHandler();
    }

}
