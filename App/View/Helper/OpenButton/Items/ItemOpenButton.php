<?php


namespace App\View\Helper\OpenButton\Items;


use App\View\Helper\PATH\Abstracts\RouteHandler;
use App\View\Helper\PATH\Interfaces\Admin\AdminBasicRoutesName;

class ItemOpenButton
{
    public $name;
    public $route;

    public function __construct(string $name, RouteHandler $route_handler, $id)
    {
        $this->name = $name;
        $this->route = route($route_handler->getRoute(AdminBasicRoutesName::INDEX_ROUTE), "params=" .$id);
    }
}
