<?php

namespace App\View\Helper\Sidebar\Items;

class SideBarList extends SideBarBase
{
    public $sublist;
    public function __construct($name, $sublist, $route_name)
    {
        parent::__construct($name, $route_name);
        $this->sublist = $sublist;
    }

    public function getType():int
    {
        return self::LIST_SIDEBAR;
    }
}
