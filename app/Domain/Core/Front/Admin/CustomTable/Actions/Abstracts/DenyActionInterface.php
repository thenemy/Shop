<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Actions\Abstracts;


use App\Domain\Core\Front\Admin\CustomTable\Actions\Interfaces\ActionInterface;
use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;

class DenyActionInterface implements ActionInterface
{

    public function click()
    {
        // TODO: Implement click() method.
    }

    public function getIcon(): int
    {
        // TODO: Implement getIcon() method.
    }

    public function getRouteHandler(): RouteHandler
    {
        // TODO: Implement getRouteHandler() method.
    }

    public function routeName()
    {
        // TODO: Implement routeName() method.
    }

    public function buildRoute($route, $params)
    {
        // TODO: Implement buildRoute() method.
    }
}
