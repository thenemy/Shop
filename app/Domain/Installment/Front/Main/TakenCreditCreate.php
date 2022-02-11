<?php

namespace App\Domain\Installment\Front\Main;

use App\Domain\Core\File\Models\Livewire\FileLivewireNestedWithoutEntity;
use App\Domain\Core\Front\Admin\Attributes\Containers\Container;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerColumn;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerRow;
use App\Domain\Core\Front\Admin\Attributes\Containers\NestedContainer;
use App\Domain\Core\Front\Admin\Attributes\Containers\Visibility;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\TextAreaAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\CreditProduct\Front\Admin\DropDown\CreditDropDownAssociated;
use App\Domain\CreditProduct\Front\Admin\DropDown\MainCreditDropDownRelation;
use App\Domain\CreditProduct\Front\Admin\DropDown\MainCreditDropDownSearch;
use App\Domain\Installment\Entities\TakenCredit;
use App\Domain\Installment\Front\Admin\Components\SumComponent;
use App\Domain\Installment\Front\Admin\Dispatch\DispatchCredit;
use App\Domain\Installment\Front\Admin\Dispatch\DispatchProduct;
use App\Domain\Installment\Front\Admin\DropDown\IntsallmentCityDropDown;
use App\Domain\Product\Product\Front\Admin\AdditionalActions\GenerateRuleProductAdditionalAction;
use App\Domain\Product\Product\Front\Nested\ProductInstallmentNested;
use App\Domain\Product\Product\Front\Nested\ProductNested;
use App\Domain\Shop\Front\Admin\DropDown\ShopAvailableCitiesDropDownSearch;
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
            UserDropDownRelation::newUser(PlasticCardDropDownAssociated::class),
            MainCreditDropDownRelation::newCredit(
                CreditDropDownAssociated::class,
                DispatchCredit::class),
            InputAttribute::createAttribute("initial_price",
                "number", "Первоначальная плата",
                "initial_payment", "pay-update"),
            InputAttribute::createAttribute(
                "payment_type",
                'checkbox',
                "Уплачен на кассе",
                "initial_pay",
            ),
            new FileLivewireNestedWithoutEntity("TakenCredit", $this->getProductsView()),

            ContainerColumn::newClass("border-2 rounded p-2 w-full justify-start items-start", [
                InputAttribute::createAttribute(
                    "delivery",
                    'checkbox',
                    "Будет доставка",
                    "payment_type",
                    "delivery-update"
                ),
                Visibility::newVisibility("delivery-update", [
                    IntsallmentCityDropDown::newCities(),
                    Container::new([
                        'class' => 'p-2'
                    ]),
                    Container::new([
                        'class' => 'flex flex-wrap justify-between items-around'
                    ], [
                        InputAttribute::createAttribute(self::DELIVERY_ADDRESS_TO . "index",
                            "number", "Индекс"),
                        InputAttribute::createAttribute(self::DELIVERY_ADDRESS_TO . "street",
                            "text", "Улица"),
                        InputAttribute::createAttribute(self::DELIVERY_ADDRESS_TO . 'house',
                            "number", "Номер дома"),
                        InputAttribute::createAttribute(self::DELIVERY_ADDRESS_TO . 'flat',
                            "number", "Этаж"),
                    ]),
                    Container::new([
                        'class' => 'p-2'
                    ]),
                    new TextAreaAttribute(self::DELIVERY_ADDRESS_TO . "instructions",
                        "Инструкции для курьера"),
                ], [
                    'class' => "space-y-4"
                ]),
            ]),
            ContainerColumn::newClass("border-2 rounded p-2 w-full items-start", [
                InputAttribute::createAttribute(
                    self::SURETY_TO . "check",
                    'checkbox',
                    "Поручитель",
                    "surety_check",
                    "surety-update"
                ),
                Visibility::newVisibility("surety-update", [
                    NestedContainer::new("__(\"Добавить\")", [
                        self::generationSuretyCreate(self::SURETY_TO)
                    ]),
                ])
            ]),
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
