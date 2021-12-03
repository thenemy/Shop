<?php


namespace App\View\Helper\Sidebar\Items;


use Illuminate\Support\Facades\Route;

class Sidebar extends SideBarBase
{
    public function __construct($name, $route_name)
    {
        parent::__construct($name, $route_name);
    }

    public function getType(): int
    {
        return self::USUAL_SIDEBAR;
    }


    public function isCurrentRoute(): bool
    {

        return Route::is($this->current_name);
    }
}
