<?php

namespace App\Domain\Core\Front\Admin\CustomTable\Abstracts;

use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\Domain\Core\Front\Admin\Routes\Interfaces\RoutesInterface;

abstract class AbstractCreateTable extends AbstractTable
{
    public string $route_create;

    public function __construct($entities = [])
    {
        $this->route_create = route($this->getRouteHandler()
            ->getRoute(RoutesInterface::CREATE_ROUTE), \Request::query());
        parent::__construct($entities);
    }

    abstract public function getRouteHandler(): RouteHandler;

    public function generateHtml(): string
    {
        return '<x-helper.table.table_form :table="$table" :optional="$optional"/>';
    }
}
