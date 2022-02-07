<?php

namespace App\Domain\Payment\Front\Admin\Functions;

use App\Domain\Core\Api\CardService\Model\WithdrawMoney;
use App\Domain\Core\Front\Admin\Livewire\Functions\Abstracts\AbstractFunction;
use App\Domain\Delivery\Api\Services\OrderService;
use App\Domain\Installment\Interfaces\PurchaseStatus;
use App\Http\Livewire\Admin\Base\Abstracts\BaseEmptyLivewire;

class AcceptPayment extends AbstractFunction
{
    const FUNCTION_NAME = "acceptPayment";

    static public function acceptPayment(BaseEmptyLivewire $livewire)
    {
        $entity = $livewire->entity;
        try {
            $entity->status = PurchaseStatus::ACCEPTED;
            $entity->save();
            $money = new WithdrawMoney($entity);
            $money->saveWithdraw();
            if ($entity->purchase->delivery_address) {
                $order = new OrderService();
                $order->createOrder($entity->purchase);
            }
            session()->flash("success", __("Заказ успешно принят"));
        } catch (\Throwable $exception) {
            $livewire->addError("error", $exception->getMessage());
        }

    }
}
