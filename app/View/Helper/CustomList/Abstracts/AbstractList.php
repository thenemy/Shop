<?php


namespace App\View\Helper\CustomList\Abstracts;


use App\View\Helper\CustomList\Interfaces\AdminListItemInterfaces;
use App\View\Helper\CustomList\Items\ListItems;
use App\View\Helper\PATH\Abstracts\RouteHandler;
use App\View\Helper\PATH\Interfaces\Admin\AdminBasicRoutesName;

abstract class AbstractList implements AdminListItemInterfaces, AdminBasicRoutesName
{
    public $add_route;
    public $items;
    protected $delete_route;
    protected $edit_route;
    public $paginate;

    public function __construct($objects, RouteHandler $routeHandler)
    {
        $this->add_route = route($routeHandler->getRoute(self::CREATE_ROUTE));
        $this->delete_route = $routeHandler->getRoute(self::DESTROY_ROUTE);
        $this->edit_route = $routeHandler->getRoute(self::EDIT_ROUTE);
        $this->items = self::getListItems(
            $objects,
            $this->delete_route,
            $this->edit_route
        );
        $this->paginate = $objects;
    }

    static public function getListItems($items, string $delete, string $edit): array
    {

        return $items->map(function ($item) use ($edit, $delete) {
            return new ListItems($item->id,
                $item->name,
                route($edit, $item->id),
                route($delete, $item->id));
        })->all();
    }
}
