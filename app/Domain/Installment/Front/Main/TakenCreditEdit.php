<?php

namespace App\Domain\Installment\Front\Main;

use App\Domain\Core\File\Models\Livewire\FileLivewireCreatorWithFilterBy;
use App\Domain\Core\File\Models\Livewire\FileLivewireWithoutActionFilterBy;
use App\Domain\Core\Front\Admin\Attributes\Conditions\ENDIFstatement;
use App\Domain\Core\Front\Admin\Attributes\Conditions\IFstatement;
use App\Domain\Core\Front\Admin\Attributes\Containers\Container;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerColumn;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerRow;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerTitle;
use App\Domain\Core\Front\Admin\Attributes\Containers\NestedContainer;
use App\Domain\Core\Front\Admin\File\Attributes\FileAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextLinkAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextLinkDownloadAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Routes\Interfaces\RoutesInterface;
use App\Domain\Core\Front\Admin\Routes\Models\LinkGenerator;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Installment\Entities\TakenCredit;
use App\Domain\Installment\Front\Dynamic\CommentInstallmentDynamic;
use App\Domain\Installment\Front\Nested\MonthlyPaidIndex;
use App\Domain\Installment\Front\Nested\TimeScheduleTransactionIndex;
use App\Domain\Order\Front\UserPurchaseMain\PurchaseMain;
use App\Domain\User\Front\Admin\Path\UserRouteHandler;
use App\Domain\User\Front\Dynamic\SuretyPlasticCardDynamic;
use App\Domain\User\Front\Traits\SuretyGenerationAttributes;
use App\Domain\User\Interfaces\UserRelationInterface;

class TakenCreditEdit extends TakenCredit implements CreateAttributesInterface
{
    use SuretyGenerationAttributes;

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            ContainerRow::newClass("w-full", [
                ContainerColumn::newClass("basis-5/12", [
                    ContainerTitle::newTitle("Информация о клиенте",
                        "border shadow p-4 space-y-4", [
                            KeyTextLinkAttribute::newLink(
                                __("Имя клиента"),
                                self::CRUCIAL_DATA_TO . "name",
                                LinkGenerator::new(UserRouteHandler::new())->show("user_id")
                            ),
                            KeyTextAttribute::new(__("Номер карты"), self::PLASTIC_CARD_TO . "pan")
                        ]),
                    ContainerTitle::newTitle("Информация о кредите",
                        "border shadow p-4 space-y-4",
                        [
                            KeyTextAttribute::new(__("Номер Договора"), self::PURCHASE_TO . 'id'),
                            KeyTextAttribute::new(__("Количество покупок"), self::PURCHASE_TO . 'number_purchase'),
                            KeyTextAttribute::new(__("Сумма договора"), "allToPay()"),
                            KeyTextAttribute::new(__("Первоначальная оплата"), "initial_price"),
                            KeyTextAttribute::new(__("Ежемесячный платеж"), "monthly_paid"),
                            KeyTextAttribute::new(__("Количество месяцев"), 'number_month'),
                            KeyTextAttribute::new(__("Процент"), self::CREDIT_TO . "percent", "%")
                        ])
                ]),
                ContainerTitle::newTitle("Сведения", "border p-4 shadow space-y-2 flex-1", [
                    new FileLivewireWithoutActionFilterBy("TakenCreditEdit", MonthlyPaidIndex::new()),
                    new FileLivewireWithoutActionFilterBy("TakenCreditEdit", TimeScheduleTransactionIndex::new())
                ])
            ]),
            IFstatement::new(
                self::getWithoutScopeAtrVariable(self::SURETY_TO),
                ContainerRow::newClass("w-full", [
                    ContainerTitle::newTitle("Информация о поручители",
                        "border shadow p-4 space-y-4", [
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
                ])),
            SuretyPlasticCardDynamic::getDynamic("TakenCreditEdit"),
            ENDIFstatement::new(),
            NestedContainer::new("__(\"Товары\")", [
                new  FileLivewireWithoutActionFilterBy("TakenCreditEdit", PurchaseMain::new())
            ], [
                'class' => "flex flex-col"
            ]),
            CommentInstallmentDynamic::getDynamic("TakenCreditEdit"),
        ]);
    }



//    public function getPassportReverseEditAttribute(): FileAttribute
//    {
//        return $this->getPassportReverseEdit(self::SURETY_TO);
//    }
//
//    public function getPassportUserEditAttribute(): FileAttribute
//    {
//        return $this->getPassportUserEdit(self::SURETY_TO);
//    }
//
//    public function getPassportEditAttribute(): FileAttribute
//    {
//        return $this->getPassportEdit(self::SURETY_TO);
//    }
}
