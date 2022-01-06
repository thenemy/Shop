<?php

namespace App\View\Helper\Sidebar\Items;

use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use Illuminate\Support\Facades\Route;

class SideBarDrop extends SideBarBase
{
    public string $route_also;
    public string $icon;
    public function __construct($name, RouteHandler $route_name, string $icon = "")
    {
        parent::__construct($name, $route_name);
        $this->icon = $icon;
        $this->route_also = $this->getOtherRoutes($this->current_name);

    }

    private function getOtherRoutes($route_name): string
    {
        $split_name = explode(".", $route_name);
        $split_name[count($split_name) - 1] = "*";
        return implode(".", $split_name);
    }



    public function isCurrentRoute(): bool
    {
        return Route::is($this->route_also);
    }
}
