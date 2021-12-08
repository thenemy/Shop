<?php

namespace App\Domain\Installment\Front\Main;

use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Installment\Entities\TakenCredit;

class TakenCreditEdit extends TakenCredit implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([

        ]);
    }
}
