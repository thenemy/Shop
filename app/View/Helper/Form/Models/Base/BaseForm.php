<?php


namespace App\View\Helper\Form\Models\Base;


use App\View\Helper\PATH\Abstracts\RouteHandler;
use App\View\Helper\PATH\Interfaces\Admin\AdminBasicRoutesName;

class BaseForm implements AdminBasicRoutesName
{
    public $title;
    public $save_route;
    public $back_route;

    public function __construct($title, RouteHandler $routeHandler)
    {
        $this->title = $title;
        $this->back_route = route($routeHandler->getRoute(self::INDEX_ROUTE));
        $this->save_route = route($routeHandler->getRoute(self::STORE_ROUTE));

    }

    static public function update_construct($title, $id, RouteHandler $routeHandler = null): BaseForm
    {
        return self::update($title, $id, $routeHandler, []);
    }

    static protected function update($title, $id, RouteHandler $routeHandler = null, $params = []): BaseForm
    {
        $new = new self($title, $routeHandler);
        $array_id = [$id];
        $new->save_route = route($routeHandler->getRoute(self::UPDATE_ROUTE), array_merge($array_id, $params));
        return $new;
    }
}
