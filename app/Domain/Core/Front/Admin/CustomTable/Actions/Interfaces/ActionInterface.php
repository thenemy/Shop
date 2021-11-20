<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Actions\Interfaces;


use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;

interface ActionInterface
{
    public function click();

    public function getIcon():int;

    public function getRouteHandler(): RouteHandler;

    public function subActionRoute();

    public function buildRoute($route, $params);

    const TYPE_ACTION = 1;
    const TYPE_DENY = 2;
    const TYPE_DELETE = 3;
    const TYPE_EDIT = 4;

    const CREATE = "create";
    const INDEX = "index";
    const ACCEPT  = "accept";
}
