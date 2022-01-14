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

    public function unpaidForMonth()
    {
        return $this
            ->where('month', month_num())
            ->from('month_paid', 'check')
            ->where("month_paid.paid", "<", "check.must_pay")
            ->select('month_paid.*');
    }
}
