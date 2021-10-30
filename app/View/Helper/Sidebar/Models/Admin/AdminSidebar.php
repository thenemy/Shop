<?php


namespace App\View\Helper\Sidebar\Models\Admin;


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
            new SideBarList("Баннеры", [
                new SideBar("aaa", self::getRoute(new CategoryRouteHandler())),
                new SideBar("sss", self::getRoute(new CategoryRouteHandler()))
            ], self::getRoute(new BannerRouteHandler())),
            new SideBar("Категории", self::getRoute(new CategoryRouteHandler())),
        ];
    }

    private static function getRoute(RouteHandler $routeHandler): string
    {

        return $routeHandler->getRoute(AdminBasicRoutesName::INDEX_ROUTE);

    }
}
