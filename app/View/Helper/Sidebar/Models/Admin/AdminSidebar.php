<?php

namespace App\View\Helper\Sidebar\Models\Admin;


use App\Domain\Category\Front\Admin\Path\CategoryAllRouteHandler;
use App\Domain\Category\Front\Admin\Path\CategoryRouteHandler;
use App\Domain\Comments\Front\Admin\Path\CommentProductRouteHandler;
use App\Domain\Common\Banners\Front\Admin\Path\BannerRouteHandler;
use App\Domain\Common\Brands\Front\Admin\Path\BrandRouteHandler;
use App\Domain\Common\Colors\Front\Admin\Path\ColorRouteHandler;
use App\Domain\Common\Discounts\Front\Admin\Path\DiscountRouteHandler;
use App\Domain\CreditProduct\Front\Admin\Path\MainCreditRouteHandler;
use App\Domain\Dashboard\Path\DashboardRouteHandler;
use App\Domain\Installment\Front\Admin\Path\TakenCreditRouteHandler;
use App\Domain\Order\Front\Admin\Path\UserPurchaseRouteHandler;
use App\Domain\Payment\Front\Admin\Route\PaymentRouteHandler;
use App\Domain\Product\Product\Front\Admin\Path\ProductRouteHandler;
use App\Domain\Settings\Front\Path\SettingRouteHandler;
use App\Domain\Shop\Front\Admin\Path\ShopRouteHandler;
use App\Domain\User\Front\Admin\Path\AdminUserRouteHandler;
use App\Domain\User\Front\Admin\Path\UserRouteHandler;


class AdminSidebar implements \SideBarFactoryInterface
{
    static public function sideBars(): \SideBarList
    {
        return new \SideBarList(
            [
                new \SideBarDrop(__("Главная"), DashboardRouteHandler::new(), "fa-home"),
                new \SideBarList( [
                    new \SideBarDrop(__("Клиенты"), UserRouteHandler::new()),
                    new \SideBarDrop(__("Админы"), AdminUserRouteHandler::new()),
                ],__("Пользователи"),
                    "fa-user"),
                new \SideBarDrop(__("Магазины"), ShopRouteHandler::new(), "fa-shopping-bag"),
                new \SideBarList([
                    new \SideBarDrop(__("Главные категории"), CategoryRouteHandler::new()),
                    new \SideBarDrop(__("Все категории"), CategoryAllRouteHandler::new()),
                ],
                    __("Раздел Категорий"),
                    "fa-archive"
                ),
                new \SideBarList([
                    new \SideBarDrop(__("Банеры"), BannerRouteHandler::new()),
                    new \SideBarDrop(__("Брэнды"), BrandRouteHandler::new()),
                    new \SideBarDrop(__("Цвета"), ColorRouteHandler::new()),
                    new \SideBarDrop(__("Скидки"), DiscountRouteHandler::new())
                ],
                    __("Общие"),
                    "fa-inbox"
                ),
                new \SideBarList([
                    new \SideBarDrop(__("Товары"), ProductRouteHandler::new())
                ],
                    __("Действия для товаров"),
                    "fa-tshirt"
                ),
                new \SideBarList([
                    new \SideBarDrop(__("Новые заказы"), UserPurchaseRouteHandler::new()),
                    new \SideBarDrop(__("Рассрочка"), TakenCreditRouteHandler::new()),
                    new \SideBarDrop(__("Покупки"), PaymentRouteHandler::new()),

                ],
                    "Заказы",
                    "fa-money-bill-alt"
                ),
                new \SideBarDrop(__("Комментарии"), CommentProductRouteHandler::new(), "fa-comment"),
                new \SideBarList([

                ],
                    "Доставка",
                    "fa-car"
                ),
                new \SideBarDrop(__("Настройки"), MainCreditRouteHandler::new(), "fa-cogs"),

            ],
        );
    }

}
