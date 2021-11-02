<?php


namespace App\Domain\Core\Front\Admin\Form\Models\Base;


use App\View\Helper\PATH\Interfaces\Admin\AdminBasicRoutesName;

abstract class BaseForm implements AdminBasicRoutesName
{
    public $title;
    public $route_back;
    public $route_save;
    public $route_handler;

    public function __construct()
    {
        $this->route_handler = $this->getRouteHandler();
        $this->route_back = route($this->route_handler->getRoute(self::INDEX_ROUTE));
        $this->route_save = route($this->route_handler->getRoute(self::STORE_ROUTE));
    }

    public function create($title): BaseForm
    {
        $this->title = $title;
        return $this;
    }

    public function update($title, $params = []): BaseForm
    {
        $this->create($title);
        $this->route_save = route($this->route_handler->getRoute(self::UPDATE_ROUTE));
        return $this;
    }
}
