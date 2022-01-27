<?php

namespace App\Domain\Installment\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;
use App\Domain\Installment\Entities\MonthPaid;
use App\Domain\Installment\Interfaces\PurchaseStatus;

class MonthPaidBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "paid";
    }

    protected function getParent(): string
    {
        return "taken_credit_id";
    }

    // will be rewritten
    public function unpaidForMonth()
    {
        return $this
            ->from('month_paid', "first")
            ->join("taken_credits", "taken_credits.id", "=", "first.taken_credit_id")
            ->where("ABS(taken_credits.status)", "=", PurchaseStatus::ACCEPTED)
            ->whereColumn("first.paid", "<", "first.must_pay") // check already paid or not
            ->whereDate("first.month", "<=", now())
            ->select('first.*');
    }
}
