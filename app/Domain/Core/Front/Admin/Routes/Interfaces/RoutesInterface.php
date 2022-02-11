<?php


namespace App\Domain\Core\Front\Admin\Routes\Interfaces;


interface RoutesInterface
{
    public const INDEX_ROUTE = "admin.change.index";
    public const CREATE_ROUTE = "admin.change.create";
    public const EDIT_ROUTE = "admin.change.edit";
    public const DESTROY_ROUTE = "admin.change.destroy";
    public const STORE_ROUTE = "admin.change.store";
    public const UPDATE_ROUTE = "admin.change.update";
    public const SHOW_ROUTE = "admin.change.show";
    public const  INDEX = 'index';
    public const  CREATE = 'create';
    public const  EDIT = 'edit';
    public const SHOW = 'show';
}

