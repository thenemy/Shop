<?php

namespace App\Domain\Dashboard\Main;

use App\Domain\Core\File\Models\Livewire\FileLivewireWithoutActionFilterBy;
use App\Domain\Core\Front\Admin\Attributes\Containers\BoxTitleContainer;
use App\Domain\Core\Front\Admin\Attributes\Containers\Container;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerRow;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerTitle;
use App\Domain\Core\Front\Admin\Attributes\Containers\NestedContainer;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Routes\Interfaces\RoutesInterface;
use App\Domain\Core\Front\Admin\Routes\Models\LinkGenerator;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Currency\Front\Attributes\CurrencyAttribute;
use App\Domain\Currency\Front\Attributes\MoneyAttribute;
use App\Domain\Dashboard\Front\Attributes\BarCharAttribute;
use App\Domain\Dashboard\Front\Attributes\CurrentAttribute;
use App\Domain\Dashboard\Front\Attributes\DoughnutChartAttribute;
use App\Domain\Dashboard\Front\Attributes\StatisticAttribute;
use App\Domain\Dashboard\Models\Dashboard;
use App\Domain\Dashboard\Nested\TakenCreditNew;
use App\Domain\Installment\Entities\TakenCredit;
use App\Domain\Installment\Front\Admin\Path\TakenCreditRouteHandler;
use App\Domain\Payment\Front\Nested\PaymentFiltered;
use App\Domain\User\Entities\User;
use App\Domain\User\Front\Admin\Path\UserRouteHandler;

class DashboardMain extends Dashboard implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([

            Container::newClass("mr-4 space-y-1", [

                ContainerRow::newClass("w-full", [
                    ContainerTitle::newTitle("Статистика",
                        "items-center block p-3 bg-white w-full h-full shadow-lg rounded", [
                            ContainerRow::newClass("justify-around w-full", [
                                StatisticAttribute::newLink(
                                    "fas fa-cash-register",
                                    TakenCredit::class . "::count()",
                                    "0",
                                    "Рассрочки",
                                    LinkGenerator::new(TakenCreditRouteHandler::new())->index(),
                                    LinkGenerator::new(TakenCreditRouteHandler::new())->index(),
                                ),
                                StatisticAttribute::newLink(
                                    "fas fa-address-book",
                                    TakenCredit::class . "::unpaidCredits()",
                                    "0",
                                    "Просроченные рассрочки",
                                    LinkGenerator::new(TakenCreditRouteHandler::new())->index(),
                                    LinkGenerator::new(TakenCreditRouteHandler::new())->index(),
                                ),
                                StatisticAttribute::newLink(
                                    "fas fa-calendar-day",
                                    "0",
                                    "0",
                                    "За должность",
                                    LinkGenerator::new(TakenCreditRouteHandler::new())->index(),
                                    LinkGenerator::new(TakenCreditRouteHandler::new())->index(),

                                ),
                                CurrentAttribute::newLink(
                                    "fas fa-money-bill-wave",
                                    "0",
                                    "0",
                                    "Действующие рассрочки",
                                    LinkGenerator::new(TakenCreditRouteHandler::new())->index(),
                                    LinkGenerator::new(TakenCreditRouteHandler::new())->index(),
                                )
                            ])
                        ]),

                ]),
                ContainerRow::new([
                    'class' => ""
                ], [
                    BarCharAttribute::new(),
                    DoughnutChartAttribute::new(),

                ]),

//                ContainerRow::newClass("justify-between", [
//
//                    Container::new([
////                        ':class' => 'isSideBarOpen && `max-w-[60vw]` || `max-w-[45vw]`',
//                    ], [
//                        BoxTitleContainer::newTitle(
//                            "Новые Рассрочки",
//                            " overflow-x-auto"
//                            , [
//                            new FileLivewireWithoutActionFilterBy("DashboardMain", TakenCreditNew::new()),
//
//                        ]),
//                    ]),
//
//                    BoxTitleContainer::newTitle(
//                        "Новые заказы",
//                        " block overflow-x-auto w-min",
//                        [
//                            new FileLivewireWithoutActionFilterBy("DashboardMain", PaymentFiltered::new()),
//                        ])
//                ]),
            ])
        ]);
    }

    public function getTitle()
    {
        return "Главная";
    }
}
