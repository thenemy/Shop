<?php

namespace App\Domain\Installment\Services;

use App\Domain\Core\Api\CardService\Merchant\Model\Merchant;
use App\Domain\Core\Api\CardService\Model\WithdrawMoney;
use App\Domain\CreditProduct\Entity\Credit;
use App\Domain\Installment\Entities\TakenCredit;
use App\Domain\Installment\Payable\TakenCreditPayable;
use App\Domain\Order\Interfaces\UserOrderInterface;
use App\Domain\Order\Services\UserPurchaseService;
use App\Domain\Product\Product\Entities\Product;
use function Symfony\Component\Translation\t;

class InstallmentPayService
{
    private UserPurchaseService $purchaseService;
    private WithdrawMoney $withdraw;
    private float $initial_price;
    private Credit $credit;
    private array $object_data;

    public function __construct(array $object_data, TakenCreditPayable $taken)
    {
        $this->initial_price = $this->getInitialPrice($object_data);
        $this->credit = $this->getCredit($object_data);
        $this->object_data = $object_data;
        $this->purchaseService = new UserPurchaseService();
        $this->withdraw = new WithdrawMoney($taken);
    }

    //*
    // make unique exception
    // give appropriate name for them
    // so
    //  if cannot be installed will be thrown error cannot be installed
    // I will catch and dispatch FailedToWithdraw
    //**/
    public function pay()
    {
        try {
            $overall_sum = $this->createUserPurchase();
            $true_sum = $this->getTrueSum($overall_sum);
            $sum_per_month = $this->getSumPerMonth($true_sum);
            $this->fillMonthPaid($sum_per_month);
            $this->withdraw->withdraw();
        } catch (\Exception $exception) {
            $this->withdraw->reverse();
            throw $exception;
        }

    }

    public function createUserPurchase(): int
    {
        $this->object_data['status'] = $this->getStatus($this->object_data);
        $purchase = $this->purchaseService->create($this->object_data);
        return $purchase->purchases()->sum('price');
    }

    private function getTrueSum($overall_sum): float
    {
        $percent = $this->credit->percent / 100;
        $percent_sum = $percent * $overall_sum;
        return $percent_sum + $overall_sum - $this->initial_price;
    }

    private function getSumPerMonth($true_sum): float
    {
        return $true_sum / $this->credit->month;
    }


    //create MonthPaid for TakenCredit
    private function fillMonthPaid($sum_per_month)
    {
        $months = [];
        for ($i = 0; $i <= $this->credit->month; $i++) {
            $correct_month = ($i + month_num()) % 12;
            array_push($months, [
                'month' => $correct_month,
                'must_pay' => $sum_per_month
            ]);
        }
        $this->taken->monthPaid()->createMany($months);
    }

    private function getStatus(array &$object_data): int
    {
        $status = UserOrderInterface::INSTALMENT;
        if (isset($object_data['delivery'])) {
            $status += UserOrderInterface::DELIVERY;
        } else {
            $status += UserOrderInterface::SELF_DELIVERY;
        }
        unset($object_data['delivery']);

        return $status;
    }

    private function getInitialPrice(array &$object_data)
    {
        $initial = $object_data['initial_price'];
        unset($object_data['initial_price']);
        return $initial;
    }

    private function getCredit(array &$object_data)
    {
        $credit = Credit::find($object_data['credit_id']);
        unset($object_data['credit_id']);
        return $credit;
    }
}
