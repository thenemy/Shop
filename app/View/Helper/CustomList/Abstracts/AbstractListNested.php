<?php


namespace App\View\Helper\CustomList\Abstracts;


use App\View\Helper\PATH\Abstracts\RouteHandler;
use Illuminate\Support\Collection;

class AbstractListNested extends AbstractListWithParams
{

    public $back_route;

    public function __construct(Collection $objects, RouteHandler $routeHandler, $params, RouteHandler $parentRouteHandler, $parent_params)
    {
        parent::__construct($objects, $routeHandler, $params);
        $this->back_route = route($parentRouteHandler->getRoute(self::EDIT_ROUTE),
            [
                $params,
                "params" => $parent_params
            ]);
    }
}
