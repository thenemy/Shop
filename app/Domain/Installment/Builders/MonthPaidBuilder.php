<?php

namespace App\Domain\Installment\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;
use App\Domain\Installment\Entities\MonthPaid;

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
            ->whereColumn("first.paid", "<", "first.must_pay") // check already paid or not
            ->whereYear("taken_credits.date_taken", "<=", date('y'))
            ->whereDay("taken_credits.date_taken", "<=", today_num()) // check  correct day
            ->where('first.month', "<=", month_num()) // check correct month
            ->select('*');
    }
}
