<?php

namespace App\Domain\Installment\Jobs;

use App\Domain\Core\Job\Base\AbstractJob;

class FailedToWithdraw extends AbstractJob
{

    public function handle()
    {
        while (true) {
            sleep(60 * 60);

        }
    }
}
