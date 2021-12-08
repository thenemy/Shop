<?php

namespace App\Domain\Installment\Front\Main;

use App\Domain\Core\File\Models\Livewire\FileLivewireNestedWithoutEntity;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\CreditProduct\Front\Admin\DropDown\MainCreditDropDownSearch;
use App\Domain\Installment\Entities\TakenCredit;
use App\Domain\Product\Product\Front\Nested\ProductNested;
use App\Domain\User\Front\Admin\DropDown\UserDropDownSearch;

class TakenCreditCreate extends TakenCredit implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            UserDropDownSearch::newUser(),
            MainCreditDropDownSearch::newCredit(),
            new FileLivewireNestedWithoutEntity("TakenCredit", $this->getProductsView()),
            // add choice for the address to the user
        ]);
    }

    public function getProductsView()
    {
        return ProductNested::generateWithoutEntity("products", "Товары");
    }
}
