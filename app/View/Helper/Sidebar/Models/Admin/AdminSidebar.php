<?php


namespace App\View\Helper\Sidebar\Models\Admin;


use App\Domain\Core\Front\Admin\Routes\Models\CategoryRouteHandler;
use App\View\Helper\PATH\Abstracts\RouteHandler;
use App\View\Helper\PATH\Interfaces\Admin\AdminBasicRoutesName;
use App\View\Helper\SideBar\Interfaces\SideBarFactoryInterface;
use App\View\Helper\SideBar\Items\SideBar;
use App\View\Helper\SideBar\Items\SideBarList;

class AdminSidebar implements SideBarFactoryInterface
{
    static public function sideBars(): array
    {
        return [
            new SideBar("Категории",new CategoryRouteHandler())
        ];
    }

    private static function getRoute(RouteHandler $routeHandler): string
    {

        return $routeHandler->getRoute(AdminBasicRoutesName::INDEX_ROUTE);

    }
}
