<?php

namespace App\Domain\Installment\Front\Main;

use App\Domain\Core\File\Models\Livewire\FileLivewireNestedWithoutEntity;
use App\Domain\Core\Front\Admin\Attributes\Containers\Container;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerColumn;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerRow;
use App\Domain\Core\Front\Admin\Attributes\Containers\NestedContainer;
use App\Domain\Core\Front\Admin\Attributes\Containers\Visibility;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\CreditProduct\Front\Admin\DropDown\CreditDropDownAssociated;
use App\Domain\CreditProduct\Front\Admin\DropDown\MainCreditDropDownRelation;
use App\Domain\CreditProduct\Front\Admin\DropDown\MainCreditDropDownSearch;
use App\Domain\Installment\Entities\TakenCredit;
use App\Domain\Installment\Front\Admin\Components\SumComponent;
use App\Domain\Installment\Front\Admin\Dispatch\DispatchCredit;
use App\Domain\Installment\Front\Admin\Dispatch\DispatchProduct;
use App\Domain\Product\Product\Front\Admin\AdditionalActions\GenerateRuleProductAdditionalAction;
use App\Domain\Product\Product\Front\Nested\ProductInstallmentNested;
use App\Domain\Product\Product\Front\Nested\ProductNested;
use App\Domain\User\Front\Admin\DropDown\PlasticCardDropDownAssociated;
use App\Domain\User\Front\Admin\DropDown\UserDropDownRelation;
use App\Domain\User\Front\Admin\DropDown\UserDropDownSearch;
use App\Domain\User\Front\Traits\SuretyGenerationAttributes;

class TakenCreditCreate extends TakenCredit implements CreateAttributesInterface
{
    use SuretyGenerationAttributes;

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            SumComponent::new(),
            ContainerRow::newClass("w-full items-end", [
                UserDropDownRelation::newUser(PlasticCardDropDownAssociated::class),
                InputAttribute::createAttribute("initial_price",
                    "number", "Первоначальная плата",
                    "initial_payment"),
                InputAttribute::createAttribute(
                    "payment_type",
                    'checkbox',
                    "Уплачен на кассе",
                    "initial_pay",
                ),
            ]),
            MainCreditDropDownRelation::newCredit(
                CreditDropDownAssociated::class,
                DispatchCredit::class),
            ContainerRow::newClass("border-2 rounded p-2 w-full justify-start", [
                InputAttribute::createAttribute(
                    "delivery",
                    'checkbox',
                    "Самовызов",
                    "payment_type",
                    "delivery-update"
                ),
            ]),
            ContainerColumn::newClass("border-2 rounded p-2 w-full items-start", [
                InputAttribute::createAttribute(
                    "surety",
                    'checkbox',
                    "Поручитель",
                    "surety_check",
                    "surety-update"
                ),
                Visibility::newVisibility("surety-update", [
                    NestedContainer::new("Добавить", [
                        self::generationSuretyCreate(self::SURETY_TO)
                    ]),
                ])
            ]),
            new FileLivewireNestedWithoutEntity("TakenCredit", $this->getProductsView()),
            // add choice for the address to the user
        ]);
    }

    public function getProductsView()
    {
        return ProductInstallmentNested::generateWithoutEntity(
            "products",
            "Товары",
            DispatchProduct::class,
            GenerateRuleProductAdditionalAction::class
        );
    }
}
