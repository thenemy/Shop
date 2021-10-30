<?php


namespace App\View\Helper\Form\Models\Base;


use App\View\Helper\PATH\Abstracts\RouteHandler;

abstract class BaseFormWithParams extends BaseForm
{
    public function __construct($title, RouteHandler $routeHandler, $params)
    {
        parent::__construct($title, $routeHandler);
        $this->back_route = route($routeHandler->getRoute(self::INDEX_ROUTE), "params=" . $params);
    }

    abstract static public function update_construct_params($title, $id, $params = ""): BaseForm;

    static protected function update_params($title, $id, RouteHandler $routeHandler, $params = ""): BaseForm
    {
        $obj = parent::update($title, $id, $routeHandler, []);

        $obj->back_route = route($routeHandler->getRoute(self::INDEX_ROUTE), ["params" => $params]);
        return $obj;
    }
}
