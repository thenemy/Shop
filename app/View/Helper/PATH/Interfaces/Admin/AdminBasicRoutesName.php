<?php


namespace App\View\Helper\PATH\Interfaces\Admin;



use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;

interface AdminBasicRoutesName
{
    public const INDEX_ROUTE = "admin.change.index";
    public const CREATE_ROUTE = "admin.change.create";
    public const EDIT_ROUTE = "admin.change.edit";
    public const DESTROY_ROUTE = "admin.change.destroy";
    public const STORE_ROUTE = "admin.change.store";
    public const UPDATE_ROUTE = "admin.change.update";

    public function getRouteHandler(): RouteHandler;
}
