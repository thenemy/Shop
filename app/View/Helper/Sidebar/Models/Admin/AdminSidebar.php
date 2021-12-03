<?php


namespace App\View\Helper\Sidebar\Models\Admin;


use App\Domain\Category\Front\Admin\Path\CategoryRouteHandler;
use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\Domain\Core\Front\Admin\Routes\Interfaces\RoutesInterface;

use App\Domain\Product\Product\Front\Admin\Path\ProductRouteHandler;
use App\Domain\Shop\Front\Admin\Path\ShopRouteHandler;
use App\Domain\User\Front\Admin\Path\UserRouteHandler;
use App\View\Helper\SideBar\Interfaces\SideBarFactoryInterface;
use App\View\Helper\SideBar\Items\SideBar;
use App\View\Helper\Sidebar\Items\SideBarDrop;
use App\View\Helper\SideBar\Items\SideBarList;
use App\View\Helper\Sidebar\Path\AdminRouteHandler;

class AdminSidebar implements SideBarFactoryInterface
{
    static public function sideBars(): SideBarList
    {
        return new SideBarList(
            [
//                SideBarDrop::new(__("Магазины") , ShopRouteHandler::new()),
                new SideBarList([
                    new SideBarDrop(__("Пользователи"), UserRouteHandler::new()),
                    new SideBarDrop(__("Магазин"), ShopRouteHandler::new()),
                ],
                    "Пользователи"
                ),
                new SideBarList([
                    new SideBarDrop(__("Товары"), ProductRouteHandler::new())
                ],
                    __("Действия для товаров")
                ),
                new SideBarList([
                    new SideBarDrop(__("Категории"), CategoryRouteHandler::new()),
                ],
                    "Раздел Категорий"
                ),
            ],
        );
    }

}
