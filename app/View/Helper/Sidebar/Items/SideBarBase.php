<?php


namespace App\View\Helper\Sidebar\Items;


use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\Domain\Core\Front\Admin\Routes\Interfaces\RoutesInterface;
use App\View\Helper\Sidebar\Interfaces\SideBarInterface;

abstract class SideBarBase implements SideBarInterface
{
    public string $name;
    public string $route_name;
    protected string $current_name;
    public $type;

    public function __construct($name, RouteHandler $route_name)
    {
        $this->name = $name;
        $this->current_name = $route_name->getRoute(RoutesInterface::INDEX_ROUTE);
        $this->route_name = route($this->current_name);
        $this->type = $this->getType();
    }

    public function getType(): int
    {
        return self::USUAL_SIDEBAR;
    }

    public static function new($name, $route_name)
    {
        $self = get_called_class();
        return new $self($name, $route_name);
    }
}
