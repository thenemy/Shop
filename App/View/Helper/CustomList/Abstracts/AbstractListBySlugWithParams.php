<?php


namespace App\View\Helper\CustomList\Abstracts;


use App\View\Helper\CustomList\Items\ListItems;
use App\View\Helper\PATH\Abstracts\RouteHandler;
use Illuminate\Support\Collection;

class AbstractListBySlugWithParams extends AbstractList
{
    public function __construct(Collection $objects, RouteHandler $routeHandler, $params)
    {
        parent::__construct($objects, $routeHandler);
        $this->add_route = route($routeHandler->getRoute(self::CREATE_ROUTE), "params=" . $params);
        $this->edit_route = $routeHandler->getRoute(self::EDIT_ROUTE);
        $this->items = self::getListItemsWithParams(
            $objects,
            $this->delete_route,
            $this->edit_route,
            $params
        );
    }

    static public function getListItemsWithParams(Collection $items, string $delete, string $edit, $params): array
    {

        return $items->map(function ($item) use ($edit, $delete, $params) {
            return new ListItems($item->id,
                $item->name,
                route($edit, [$item->slug, "params" => $params]),
                route($delete, $item->slug));
        })->all();
    }
}
