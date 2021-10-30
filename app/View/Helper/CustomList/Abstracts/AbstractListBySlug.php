<?php

namespace App\View\Helper\CustomList\Abstracts;

use App\View\Helper\CustomList\Items\ListItems;
use App\View\Helper\PATH\Abstracts\RouteHandler;
use Illuminate\Support\Collection;

abstract class AbstractListBySlug extends AbstractList
{
    public function __construct($objects, RouteHandler $routeHandler)
    {
        parent::__construct($objects, $routeHandler);
        $this->items = self::getListItems(
            $objects,
            $this->delete_route,
            $this->edit_route);
    }

    public static function getListItems($items, string $delete, string $edit): array
    {
        return $items->map(function ($item) use ($edit, $delete) {
            return new ListItems($item->id,
                $item->name,
                route($edit, $item->slug),
                route($delete, $item->slug));
        })->all();
    }
}
