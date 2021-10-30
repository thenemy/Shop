<?php


namespace App\View\Helper\Sidebar\Items;


use App\View\Helper\Sidebar\Interfaces\SideBarInterface;

abstract class SideBarBase implements SideBarInterface
{
    public $name;
    public $route_name;
    public $route_also;
    public $type;

    public function __construct($name, $route_name)
    {
        $this->name = $name;
        $this->route_name = route($route_name);
        $this->route_also = $this->getOtherRoutes($route_name);
        $this->type = $this->getType();
    }

    private function getOtherRoutes($route_name): string
    {
        $split_name = explode(".", $route_name);
        $split_name[count($split_name) - 1] = "*";
        return implode(".", $split_name);
    }

}
