<?php

namespace App\Domain\Installment\Jobs;

use App\Domain\Core\Api\CardService\Interfaces\Payable;
use App\Domain\Core\Api\CardService\Model\WithdrawMoney;
use App\Domain\Core\Job\Base\AbstractJob;
 // do we need to add token to the construct ?

class FailedToWithdraw extends AbstractJob
{
    private WithdrawMoney $withdrawMoney;

    public function __construct(Payable $payable)
    {
        $this->withdrawMoney = new WithdrawMoney($payable);
    }

    public function handle()
    {
        try {
            $this->withdrawMoney->withdraw();
        } catch (\Exception $exception) {

        }
    }
}
