<?php

namespace App\Domain\Installment\Front\Admin\Functions;

use App\Domain\Core\Api\CardService\Model\WithdrawMoney;
use App\Domain\Core\Front\Admin\Livewire\Functions\Abstracts\AbstractFunction;
use App\Domain\Currency\Entities\HoldMoney;
use App\Domain\Installment\Entities\TakenCredit;
use App\Domain\Installment\Interfaces\PurchaseStatus;
use App\Http\Livewire\Admin\Base\Abstracts\BaseEmptyLivewire;
use Illuminate\Support\Facades\DB;

class DenyInstallment extends AbstractFunction
{
    const   FUNCTION_NAME = "denyInstallment";

    public static function denyInstallment(BaseEmptyLivewire $livewire)
    {
        try {
            DB::beginTransaction();
            $entity = $livewire->entity;
            $entity->status = PurchaseStatus::DECLINED;
            $entity->reason()->create(['reason' => $livewire->reason]);
            $entity->save();
            $money = new WithdrawMoney($entity);
            $money->reverse(HoldMoney::first()->hold);
            $livewire->addError("error", __("Рассрочка успешно отвергнута"));
            DB::commit();
        } catch (\Throwable $exception) {
            DB::rollBack();
            $livewire->addError("error", $exception->getMessage());
        }

    }
}
