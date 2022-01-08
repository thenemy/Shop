<?php

namespace App\Domain\Dashboard\Main;

use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerTitle;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Currency\Front\Attributes\CurrencyAttribute;
use App\Domain\Dashboard\Models\Dashboard;

class DashboardMain extends Dashboard implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([

            ContainerTitle::newTitle("Курс валюты", "border border-blue-300 p-2 bg-white rounded shadow w-max", [
                new CurrencyAttribute()
            ])
        ]);
    }

    public function getTitle()
    {
        return "Главная";
    }
}
