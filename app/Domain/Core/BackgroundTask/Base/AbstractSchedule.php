<?php

namespace App\Domain\Core\BackgroundTask\Base;

use App\Domain\Core\BackgroundTask\Interfaces\ScheduleInterface;
use Illuminate\Console\Scheduling\Schedule;

abstract class AbstractSchedule implements ScheduleInterface
{
    protected Schedule $schedule;

    public function __construct(Schedule $schedule)
    {
        $this->schedule = $schedule;
    }

    final public function call()
    {
        $this->schedule->call(function () {
            $this->run();
        });
    }

    final static public function schedule(Schedule $schedule)
    {
        $self = get_class();
        $object = new $self($schedule);
        $object->call();
    }
}
