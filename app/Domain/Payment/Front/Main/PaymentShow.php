<?php

namespace App\Domain\Payment\Front\Main;

use App\Domain\Core\File\Models\Livewire\FileLivewireWithoutActionFilterBy;
use App\Domain\Core\Front\Admin\Attributes\Conditions\ELSEstatement;
use App\Domain\Core\Front\Admin\Attributes\Conditions\ENDIFstatement;
use App\Domain\Core\Front\Admin\Attributes\Conditions\IFstatement;
use App\Domain\Core\Front\Admin\Attributes\Containers\BoxTitleContainer;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerColumn;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerRow;
use App\Domain\Core\Front\Admin\Attributes\Containers\NestedContainer;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextLinkAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextValueAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Routes\Models\LinkGenerator;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Delivery\Front\Admin\Attributes\DeliveryInformation;
use App\Domain\Order\Front\UserPurchaseMain\PurchaseMain;
use App\Domain\Order\Interfaces\UserPurchaseStatus;
use App\Domain\Payment\Entities\Payment;
use App\Domain\Payment\Front\Admin\Attributes\DecisionAttribute;
use App\Domain\User\Front\Admin\Path\UserRouteHandler;

class PaymentShow extends Payment implements CreateAttributesInterface
{

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            DecisionAttribute::new(),
            ContainerRow::newClass("w-full space-x-4", [
                BoxTitleContainer::newTitle("Информация о клиенте",
                    "", [
                        KeyTextLinkAttribute::newLink(
                            __("Имя клиента"),
                            self::USER_TO_CRUCIAL_DATA . "name",
                            LinkGenerator::new(UserRouteHandler::new())->show("user_id")
                        ),
                        IFstatement::new(sprintf(
                            '$entity->purchase->status%%10 == %s',
                            UserPurchaseStatus::CASH)),
                        KeyTextValueAttribute::new(__("Тип оплаты"), __("Наличка")),
                        ELSEstatement::new(),
                        KeyTextAttribute::new(__("Номер карты"), self::PLASTIC_TO . "pan"),
                        ENDIFstatement::new()
                        //if plastic show plastic , if cash say payment cash
                    ]),
                BoxTitleContainer::newTitle("Информация о покупке",
                    "",
                    [
                        KeyTextAttribute::new(__("Номер Договора"), self::PURCHASE_TO . 'id'),
                        KeyTextAttribute::new(__("Количество покупок"), self::PURCHASE_TO . 'number_purchase'),
                        KeyTextAttribute::new(__("Сумма договора"), "price"),
                        // information about delivery there is has to be
                    ]),
                DeliveryInformation::new()
            ]),
            NestedContainer::new("__(\"Товары\")", [
                new  FileLivewireWithoutActionFilterBy("TakenCreditEdit", PurchaseMain::new())
            ], [
                'class' => "flex flex-col"
            ]),
        ]);
    }
}
