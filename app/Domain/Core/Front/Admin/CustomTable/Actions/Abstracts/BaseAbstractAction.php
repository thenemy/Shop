<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Actions\Abstracts;


use App\Domain\Core\Front\Admin\CustomTable\Actions\Interfaces\ActionInterface;
use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;

abstract class BaseAbstractAction implements ActionInterface
{
    private $event;

    public function __construct($params = [])
    {
        $this->event = $this->buildRoute($this->getRouteHandler()->getRoute($this->routeName()), $params);
    }
    // call in the component
    public function click(): string
    {
        return $this->event;
    }
    // change if you need custom routing
    public function buildRoute($route, $params): string
    {
        return route($route, $params);
    }
    // get route handler
    abstract public function getRouteHandler(): RouteHandler;
}
