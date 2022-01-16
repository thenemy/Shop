<?php

namespace App\Domain\Installment\Schedule;

use App\Domain\Core\BackgroundTask\Base\AbstractSchedule;
use App\Domain\Installment\Jobs\MonthPaidJobs;
use App\Domain\Installment\Payable\MonthPaidPayable;


class InstallmentDailyCheck extends AbstractSchedule
{
    public function call()
    {
        return parent::call()->daily();
    }

    public function run()
    {
        $month_pay = MonthPaidPayable::unpaidForMonth();
        foreach ($month_pay as $pay) {
            MonthPaidJobs::dispatch($pay);
        }
    }
}
