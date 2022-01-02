<?php


namespace App\View\Helper\Form\Models\Base;


use App\View\Helper\PATH\Abstracts\RouteHandler;
use App\View\Helper\PATH\Interfaces\Admin\AdminBasicRoutesName;

// object is created two time in different places -> we need only one
// in create & edit only two methods should be called
// in params of create & edit should just be title name
// in edit we should also be able to pass arr[]

abstract class BaseForm implements AdminBasicRoutesName
{
    public $title;
    public $save_route;
    public $back_route;
    private $route_handler;

    public function __construct()
    {
        $this->route_handler = $this->getRouteHandler();
        $this->back_route = route($this->route_handler->getRoute(self::INDEX_ROUTE));
        $this->save_route = route($this->route_handler->getRoute(self::STORE_ROUTE));
    }

    public function create($title): BaseForm
    {
        $this->title = $title;
        return $this;
    }

    public function update($title, $params = []): BaseForm
    {
        $this->create($title);
        $this->save_route = route($this->route_handler->getRoute(self::UPDATE_ROUTE), $params);
        return $this;
    }

}

