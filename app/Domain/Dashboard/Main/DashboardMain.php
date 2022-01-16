<?php

namespace App\Domain\Dashboard\Main;

use App\Domain\Core\File\Models\Livewire\FileLivewireWithoutActionFilterBy;
use App\Domain\Core\Front\Admin\Attributes\Containers\Container;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerRow;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerTitle;
use App\Domain\Core\Front\Admin\Attributes\Containers\NestedContainer;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Routes\Interfaces\RoutesInterface;
use App\Domain\Core\Front\Admin\Routes\Models\LinkGenerator;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Currency\Front\Attributes\CurrencyAttribute;
use App\Domain\Dashboard\Front\Attributes\StatisticAttribute;
use App\Domain\Dashboard\Models\Dashboard;
use App\Domain\Dashboard\Nested\TakenCreditNew;
use App\Domain\Installment\Entities\TakenCredit;
use App\Domain\Installment\Front\Admin\Path\TakenCreditRouteHandler;
use App\Domain\User\Entities\User;
use App\Domain\User\Front\Admin\Path\UserRouteHandler;

class DashboardMain extends Dashboard implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            Container::newClass("m-4", [
                ContainerRow::newClass("", [
                    ContainerTitle::newTitle("Курс валюты", "border border-blue-300 p-2 bg-white rounded shadow w-max", [
                        new CurrencyAttribute()
                    ]),
                    ContainerTitle::newTitle("Статистика",
                        "items-center p-2 bg-white h-full shadow-lg rounded", [
                            ContainerRow::newClass("", [
                                StatisticAttribute::newLink(
                                    "fas fa-cash-register",
                                    TakenCredit::class . "::count()",
                                    "Рассрочки",
                                    LinkGenerator::new(TakenCreditRouteHandler::new())->index()
                                ),
                                StatisticAttribute::newLink(
                                    "fas fa-address-book",
                                    TakenCredit::class . "::unpaidCredits()",
                                    "Просроченные рассрочки",
                                    LinkGenerator::new(TakenCreditRouteHandler::new())->index()
                                ),
                                StatisticAttribute::newLink(
                                    "fas fa-calendar-day",
                                    "0",
                                    "За должность",
                                    LinkGenerator::new(TakenCreditRouteHandler::new())->index()
                                ),
                                StatisticAttribute::newLink(
                                    "fas fa-user",
                                    User::class . "::newInMonth()",
                                    "Пользователей за месяц",
                                    LinkGenerator::new(UserRouteHandler::new())->index())
                            ])
                        ])
                ]),
                Container::newClass("mt-10", [
                    NestedContainer::new("__(\"Новые рассрочки\")", [
                        new FileLivewireWithoutActionFilterBy("DashboardMain", TakenCreditNew::new())
                    ])
                ])
            ])
        ]);
    }

    public function getTitle()
    {
        return "Главная";
    }
}
