<?php


namespace App\Domain\Core\Front\Admin\Form\Abstracts;


use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\View\Helper\PATH\Interfaces\Admin\AdminBasicRoutesName;

abstract class AbstractForm implements AdminBasicRoutesName
{
    public string $title;
    public string $route_back;
    public string $route_save;
    public string $name_save_button;
    public RouteHandler $route_handler;

    abstract protected function getRouteHandler(): RouteHandler;

    public function __construct()
    {

        $this->route_handler = $this->getRouteHandler();
        $this->route_back = route($this->route_handler->getRoute(self::INDEX_ROUTE));
    }

    public function create($params = []): AbstractForm
    {
        $this->title = __("Создать новый") . " " . $this->getTitle();
        $this->name_save_button = __("Cоздать новый и продолжить заполнение");
        $this->route_save = route($this->route_handler->getRoute(self::STORE_ROUTE), $params);
        return $this;
    }

    abstract protected function getTitle();

    public function update($params = []): AbstractForm
    {
        $this->title = __("Обновить") . " " . $this->getTitle();
        $this->name_save_button = __("Изменить");
        $this->route_save = route($this->route_handler->getRoute(self::UPDATE_ROUTE), $params);
        return $this;
    }
}
