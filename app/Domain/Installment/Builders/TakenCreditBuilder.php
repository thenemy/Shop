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
            ->whereDay("taken_credits.date_taken", ">", today_num())// check  day of payment gone
            ->where("first.month", ">=", month_num())
            ->count();
    }
}
