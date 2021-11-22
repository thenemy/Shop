<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Actions\Abstracts;


use App\Domain\Core\Front\Admin\CustomTable\Actions\Interfaces\ActionInterface;
use App\Domain\Core\Front\Admin\CustomTable\Actions\Interfaces\MainActionInterface;
use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\Domain\Core\Front\Interfaces\HtmlInterface;

abstract class BaseAbstractAction implements ActionInterface, HtmlInterface
{
    protected string $route;

    public function __construct($params = [])
    {
        $this->route = $this->buildRoute($this->getRouteHandler()->getRoute($this->subActionRoute()), $params);
    }


    // change if you need custom routing
    public function buildRoute($route, $params): string
    {
        return route($route, $params);
    }

    // get route handler
    abstract public function getRouteHandler(): RouteHandler;
}
