<?php

namespace App\Domain\Installment\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;
use App\Domain\Installment\Interfaces\PurchaseStatus;
use Illuminate\Support\Facades\DB;

class TakenCreditBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "purchase_id";
    }

    public function filterBy($filter)
    {
        parent::filterBy($filter); 
        if (isset($filter['filter'])) {
            $this->orderByRaw("status % 10");
        }
        if(isset($filter['not_waited'])){
            $this->where(DB::raw("status % 10"), "!=", PurchaseStatus::WAIT_ANSWER);
        }
        return $this;
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
            ->where("ABS(taken_credits.status)", "=", PurchaseStatus::ACCEPTED)
            ->whereColumn("month_paid.paid", "<", "month_paid.must_pay")
            ->whereDate("month_paid.month", "<=", now())// check  day of payment gone
            ->count();
    }
}
