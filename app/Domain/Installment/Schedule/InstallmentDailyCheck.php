<?php

namespace App\Domain\Installment\Schedule;

use App\Domain\Core\BackgroundTask\Base\AbstractSchedule;
use App\Domain\Installment\Entities\MonthPaid;
use App\Domain\Installment\Entities\TakenCredit;
use App\Domain\Installment\Jobs\MonthPaidJobs;


class InstallmentDailyCheck extends AbstractSchedule
{
    public function run()
    {
        $month_pay = MonthPaid::unpaidForMonth();
        foreach ($month_pay as $pay) {
            MonthPaidJobs::dispatch($pay);
        }
    }
}
