<?php

namespace App\Domain\Installment\Front\Admin\CustomTables\Tables;

use App\Domain\Core\Front\Admin\Attributes\Containers\Container;
use App\Domain\Core\Front\Admin\Attributes\Containers\ContainerRow;
use App\Domain\Core\Front\Admin\Attributes\Containers\DecisionModal;
use App\Domain\Core\Front\Admin\Attributes\Containers\ModalCreator;
use App\Domain\Core\Front\Admin\Attributes\Info\ErrorSuccess;
use App\Domain\Core\Front\Admin\Attributes\Models\Column;
use App\Domain\Core\Front\Admin\Button\ModelInCompelationTime\MainButtonCompile;
use App\Domain\Core\Front\Admin\Button\ModelInRunTime\ButtonGrayLivewire;
use App\Domain\Core\Front\Admin\Button\ModelInRunTime\ButtonLivewire;
use App\Domain\Core\Front\Admin\CustomTable\Abstracts\AbstractTable;
use App\Domain\Core\Front\Admin\CustomTable\Abstracts\BaseTable;
use App\Domain\Installment\Front\Admin\Functions\SmsNotPayment;

class MonthlyPaidTable extends AbstractTable
{

    public function getColumns(): array
    {
        return [
            Column::new(__("Месяц"), "month_index"),
            Column::new(__("Оплата"), "paid_index"),
            Column::new(__("Статус"), "status_index")
        ];
    }

    public function slot(): string
    {
        return ContainerRow::generateClass("justify-end items-end", [
            ErrorSuccess::new(),
            Container::new([],
                [
                    ModalCreator::new(
                        MainButtonCompile::new("Выставить счет", [
                            "@click" => "open()"
                        ]),
                        DecisionModal::new(
                            "Отправка сообщения",
                            "Вы уверены что хотите выставить счёт ?",
                            [

                            ],
                            [
                                "wire:click" => SmsNotPayment::FUNCTION_NAME
                            ]),

                    )

                ])
        ]);
    }

    public function turnOffActions(): string
    {
        return "1";
    }

}
