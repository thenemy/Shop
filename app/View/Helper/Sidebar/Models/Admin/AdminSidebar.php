<?php


namespace App\View\Helper\Sidebar\Models\Admin;


use App\Domain\Category\Front\Admin\Path\CategoryAllRouteHandler;
use App\Domain\Category\Front\Admin\Path\CategoryRouteHandler;
use App\Domain\Common\Banners\Front\Admin\Path\BannerRouteHandler;
use App\Domain\Common\Brands\Front\Admin\Path\BrandRouteHandler;
use App\Domain\Core\Front\Admin\Routes\Abstracts\RouteHandler;
use App\Domain\Core\Front\Admin\Routes\Interfaces\RoutesInterface;

use App\Domain\CreditProduct\Front\Admin\Path\MainCreditRouteHandler;
use App\Domain\Installment\Front\Admin\Path\TakenCreditRouteHandler;
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
                new SideBarDrop(__("Пользователи"), UserRouteHandler::new()),
                new SideBarDrop(__("Магазин"), ShopRouteHandler::new()),
                new SideBarList([
                    new SideBarDrop(__("Главные категории"), CategoryRouteHandler::new()),
                    new SideBarDrop(__("Все категории"), CategoryAllRouteHandler::new()),
                ],
                    "Раздел Категорий"
                ),
                new SideBarList([
                new SideBarDrop(__("Банеры"), BannerRouteHandler::new()),
                new SideBarDrop(__("Брэнды"), BrandRouteHandler::new()),],
                "Общие"),
                new SideBarList([
                    new SideBarDrop(__("Товары"), ProductRouteHandler::new())
                ],
                    __("Действия для товаров")
                ),
                new SideBarList([
                    new SideBarDrop(__("Виды рассрочки"), MainCreditRouteHandler::new()),
                    new SideBarDrop(__("Рассрочка"), TakenCreditRouteHandler::new()),
                ],
                    "Рассрочка"
                ),
                new SideBarList([
//                    new SideBarDrop(__("Виды рассрочки"), MainCreditRouteHandler::new()),
//                    new SideBarDrop(__("Рассрочка"), TakenCreditRouteHandler::new()),
                ],
                    "Доставка"
                ),

            ],
        );
    }

}
