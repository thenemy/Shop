<?php

namespace App\Domain\Installment\Services;

use App\Domain\Core\Api\CardService\Error\CardServiceError;
use App\Domain\Core\Api\CardService\Model\WithdrawMoney;
use App\Domain\CreditProduct\Entity\Credit;
use App\Domain\Installment\Payable\TakenCreditPayable;
use App\Domain\Order\Entities\UserPurchase;


class InstallmentPayService
{
    private float $initial_price;
    private Credit $credit;
    private array $object_data;
    private TakenCreditPayable $taken;

    public function __construct(array $object_data, TakenCreditPayable $taken)
    {
        $this->initial_price = $this->getInitialPrice($object_data);
        $this->credit = $this->getCredit($object_data);
        $this->object_data = $object_data;
        $this->taken = $taken;

    }

    private function withdraw()
    {
        if (!$this->isPaidInPlace()) {
            $withdraw = new WithdrawMoney($this->taken);
            try {
                $withdraw->withdraw();
            } catch (CardServiceError $exception) {
                $withdraw->reverse();
                throw $exception;
            }
        }
    }

    /// method which will add to true sum the cost of delivery

    public function pay()
    {
        try {
            $overall_sum = $this->getSumOfPurchases();
            $true_sum = $this->getTrueSum($overall_sum);
            $sum_per_month = $this->getSumPerMonth($true_sum);
            $this->fillMonthPaid($sum_per_month);
            $this->withdraw();
        } catch (\Exception $exception) {
            throw $exception;
        }

    }

    //*
    // make unique exception
    // give appropriate name for them
    // so
    // if cannot be installed will be thrown error cannot be installed
    // I will catch and dispatch FailedToWithdraw
    //**/
    private function isPaidInPlace()
    {
        return array_key_exists("payment_type", $this->object_data);
    }


    /**
     * @props  UserPurchase
     */
    private function getSumOfPurchases(): int
    {
        return $this->taken->purchase->sumPurchases();
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
    // might be rewritten
    // because there is no responsibility to create any entities
    private function fillMonthPaid($sum_per_month)
    {
        $months = [];
        for ($i = 1; $i <= $this->credit->month; $i++) {
            array_push($months, [
                'month' => now()->addMonths($i),
                'must_pay' => $sum_per_month
            ]);
        }
        $this->taken->monthPaid()->createMany($months);
//        $this->taken->saveAccept();
        /// must be set only when it will be accepted

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
