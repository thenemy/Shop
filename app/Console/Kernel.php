<?php

namespace App\Console;

use App\Domain\Delivery\Schedule\AvailableCitiesSchedule;
use App\Domain\Installment\Entities\TakenCredit;
use App\Domain\Installment\Schedule\InstallmentDailyCheck;
use App\Domain\Telegrams\Schedule\TelegramSchedule;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        InstallmentDailyCheck::schedule($schedule);
        AvailableCitiesSchedule::schedule($schedule);
        TelegramSchedule::schedule($schedule);
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     *
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
