<?php

namespace App\Domain\Installment\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class TakenCreditBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "purchase_id";
    }

    protected function newInMonth()
    {
        return $this->where("created_at");
    }

    // will be rewritten
    public function unpaidCredits()
    {
        return $this->count();
        return $this
            ->join("month_paid", "month_paid.taken_credit_id", "=", "taken_credits.id")
            ->whereColumn("month_paid.paid", "<", "month_paid.must_pay")
            ->whereDate("month_paid.month", "<=", now())// check  day of payment gone
            ->count();
    }
}
