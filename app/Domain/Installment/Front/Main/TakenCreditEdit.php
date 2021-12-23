<?php

namespace App\Domain\Installment\Front\Main;

use App\Domain\Core\File\Models\Livewire\FileLivewireCreatorWithFilterBy;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerColumn;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerRow;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerTitle;
use App\Domain\Core\Front\Admin\File\Attributes\FileAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\KeyTextAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Installment\Entities\TakenCredit;
use App\Domain\Installment\Front\Dynamic\CommentInstallmentDynamic;
use App\Domain\Installment\Front\Nested\MonthlyPaidIndex;
use App\Domain\User\Front\Traits\SuretyGenerationAttributes;

class TakenCreditEdit extends TakenCredit implements CreateAttributesInterface
{
    use SuretyGenerationAttributes;

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            ContainerRow::new("", [
                ContainerColumn::new("", [
                    ContainerTitle::newTitle("Информация о клиенте",
                        "border p-2", [
                            KeyTextAttribute::new(__("Имя клиента"), self::CRUCIAL_DATA_TO . "name"),
                            KeyTextAttribute::new(__("Номер карты"), self::PLASTIC_CARD_TO . "pin")
                        ]),
                    ContainerTitle::newTitle("Информация о товаре",
                        "border p-2", [
                            KeyTextAttribute::new(__("Номер Договора"), self::PURCHASE_TO . 'id'),
                            KeyTextAttribute::new(__("Количество покупок"), self::PURCHASE_TO . 'number_purchase'),
                            KeyTextAttribute::new(__("Сумма договора"), "sum_overall"),
                            KeyTextAttribute::new(__("Первоначальная оплата"), "initial_price"),
                            KeyTextAttribute::new(__("Ежемесячный платеж"), "monthly_paid"),
                            KeyTextAttribute::new(__("Количество месяцев"), 'number_month')
                        ])
                ]),
                ContainerColumn::new("", [
                    new FileLivewireCreatorWithFilterBy("TakenCreditEdit", MonthlyPaidIndex::class)
                ])
            ]),
            self::generationSuretyEdit(self::SURETY_TO),
            CommentInstallmentDynamic::getDynamic("TakenCreditEdit"),
        ]);
    }

    public function getNumberMonthAttribute()
    {
        return $this->credit->month;
    }

    public function getMonthlyPaidAttribute()
    {
        return $this->monthPaid->first()->must_pay;
    }

    public function getSumOverallAttribute()
    {
        return $this->allToPay();
    }

    public function getPassportReverseEditAttribute(): FileAttribute
    {
        return $this->getPassportReverseEdit(self::SURETY_TO);
    }

    public function getPassportUserEditAttribute(): FileAttribute
    {
        return $this->getPassportUserEdit(self::SURETY_TO);
    }

    public function getPassportEditAttribute(): FileAttribute
    {
        return $this->getPassportEdit(self::SURETY_TO);
    }
}
