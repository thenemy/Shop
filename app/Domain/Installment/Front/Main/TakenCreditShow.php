<?php

namespace App\Domain\Installment\Front\Main;

use App\Domain\Core\File\Models\Livewire\FileLivewireCreatorWithFilterBy;
use App\Domain\Core\File\Models\Livewire\FileLivewireWithoutActionFilterBy;
use App\Domain\Core\Front\Admin\Attributes\Conditions\ENDIFstatement;
use App\Domain\Core\Front\Admin\Attributes\Conditions\IFstatement;
use App\Domain\Core\Front\Admin\Attributes\Containers\BoxTitleContainer;
use App\Domain\Core\Front\Admin\Attributes\Containers\Container;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerColumn;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerRow;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerTitle;
use App\Domain\Core\Front\Admin\Attributes\Containers\NestedContainer;
use App\Domain\Core\Front\Admin\Attributes\Info\ErrorSuccess;
use App\Domain\Core\Front\Admin\Button\ModelInCompelationTime\RedButtonCompile;
use App\Domain\Core\Front\Admin\File\Attributes\FileAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextLinkAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextLinkDownloadAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextValueAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Form\Traits\AttributeGetVariable;
use App\Domain\Core\Front\Admin\Routes\Interfaces\RoutesInterface;
use App\Domain\Core\Front\Admin\Routes\Models\LinkGenerator;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Delivery\Front\Admin\Attributes\DeliveryInformation;
use App\Domain\Delivery\Interfaces\DeliveryStatus;
use App\Domain\Installment\Entities\TakenCredit;
use App\Domain\Installment\Front\Admin\Attributes\ConditionAttribute;
use App\Domain\Installment\Front\Admin\Attributes\DecisionAttribute;
use App\Domain\Installment\Front\Dynamic\CommentInstallmentDynamic;
use App\Domain\Installment\Front\Dynamic\PlasticCardTakenCreditDynamic;
use App\Domain\Installment\Front\Nested\MonthlyPaidIndex;
use App\Domain\Installment\Front\Nested\TimeScheduleTransactionIndex;
use App\Domain\Installment\Interfaces\PurchaseStatus;
use App\Domain\Order\Front\UserPurchaseMain\PurchaseMain;
use App\Domain\Order\Interfaces\UserPurchaseStatus;
use App\Domain\User\Front\Admin\Path\UserRouteHandler;
use App\Domain\User\Front\Dynamic\SuretyPlasticCardDynamic;
use App\Domain\User\Front\Traits\SuretyGenerationAttributes;
use App\Domain\User\Interfaces\UserRelationInterface;


class TakenCreditShow extends TakenCredit implements CreateAttributesInterface
{
    use SuretyGenerationAttributes, AttributeGetVariable;

    public function getVarTitle()
    {
        return '__("Информация о рассрочке  #") . $entity->purchase_id';
    }

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            Container::newClass("space-y-4 mr-4", [
                ContainerRow::newClass("w-full", [
                    ContainerColumn::newClass("basis-5/12", [
                        BoxTitleContainer::newTitle("Информация о клиенте",
                            "", [
                                KeyTextLinkAttribute::newLink(
                                    __("Имя клиента"),
                                    self::CRUCIAL_DATA_TO . "name",
                                    LinkGenerator::new(UserRouteHandler::new())->show("user_id")
                                ),
                                KeyTextAttribute::new(__("Номер телефона"), self::PLASTIC_CARD_TO . "phone"),
                                KeyTextAttribute::new(__("Номер карты"), self::PLASTIC_CARD_TO . "card_number"),

                            ]),
                        BoxTitleContainer::newTitle("Информация о кредите",
                            "",
                            [
                                KeyTextAttribute::new(__("Номер Договора"), self::PURCHASE_TO . 'id'),
                                KeyTextAttribute::new(__("Количество покупок"),
                                    self::PURCHASE_TO . 'number_purchase'),
                                KeyTextValueAttribute::new(__("Сумма договора"),
                                    sprintf("{{ %s . \" сум \"   . \" ( \" .  %s . \" сум \" . __(\"первоначальный\") . \")\" }}",
                                        self::getWithoutScopeAtrVariable("allToPay()"),
                                        self::getWithoutScopeAtrVariable("initial_price"))),
                                KeyTextAttribute::new(__("Первоначальная оплата"), "initial_price"),
                                KeyTextValueAttribute::new(__("Ежемесячный платеж"),
                                    sprintf(
                                        "%s сум \"%s\" ",
                                        self::getAttributeVariable("monthly_paid"),
                                        self::getAttributeVariable("nextPayDate()")
                                    )
                                ),
                                KeyTextAttribute::new(__("Количество месяцев"), 'number_month'),
                                KeyTextAttribute::new(__("Процент"), self::CREDIT_TO . "percent", "%")
                            ]),
                        IFstatement::new(self::getWithoutScopeAtrVariable(self::SURETY_TO)),
                        BoxTitleContainer::newTitle("Информация о поручители",
                            "", [
                                KeyTextAttribute::new(__("Имя"), self::SURETY_CRUCIAL_DATA_TO . 'name'),
                                KeyTextAttribute::new(__("Серия паспорта"), self::SURETY_CRUCIAL_DATA_TO . 'series'),
                                KeyTextAttribute::new(__("ПНФЛ"), self::SURETY_CRUCIAL_DATA_TO . 'pnfl'),
                                KeyTextAttribute::new(__("Телефон"), self::SURETY_TO . "phone"),
                                KeyTextAttribute::new(__("Дополнительный номер"), self::SURETY_TO . 'additional_phone'),
                                KeyTextAttribute::new(__("Дата рождения"), self::SURETY_CRUCIAL_DATA_TO . 'date_of_birth'),
                                KeyTextLinkDownloadAttribute::newLink(__("Паспорт"), __("Скачать"),
                                    self::SURETY_CRUCIAL_DATA_TO . 'passport'),
                                KeyTextLinkDownloadAttribute::newLink(__("Прописка"), __("Скачать"),
                                    self::SURETY_CRUCIAL_DATA_TO
                                    . "passport_reverse"),
                                KeyTextLinkDownloadAttribute::newLink(__("Паспорт c пользователем"), __("Скачать"),
                                    self::SURETY_CRUCIAL_DATA_TO
                                    . "user_passport"),
                            ]),
                        ENDIFstatement::new(),
                        DeliveryInformation::new(),
                        ConditionAttribute::new()
                    ]),
                    ContainerColumn::newClass("flex-1", [
                        BoxTitleContainer::newTitle("Сведения об оплате", "", [
                            new FileLivewireWithoutActionFilterBy("TakenCreditEdit", MonthlyPaidIndex::new()),
                        ]),
                        BoxTitleContainer::newTitle("Комментарии", "", [
                            CommentInstallmentDynamic::getDynamicWithoutContainer("TakenCreditEdit"),
                        ]),
                        BoxTitleContainer::newTitle("Журнал авто списаний", "", [
                            new FileLivewireWithoutActionFilterBy("TakenCreditEdit", TimeScheduleTransactionIndex::new())
                        ]),
                    ])
                ]),
                NestedContainer::new("__(\"Товары\")", [
                    new  FileLivewireWithoutActionFilterBy("TakenCreditEdit", PurchaseMain::new())
                ], [
                    'class' => "flex flex-col"
                ]),
                PlasticCardTakenCreditDynamic::getDynamic("TakenCreditEdit",),

                NestedContainer::new("__(\"Добавить поручателя\")", [
                    self::generationSuretyCreate(self::SURETY_TO)
                ]),

                DecisionAttribute::new(),
            ]),

        ]);
    }

}
