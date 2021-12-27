<?php

namespace App\Domain\Installment\Jobs;

use App\Domain\Core\Api\CardService\Interfaces\Payable;
use App\Domain\Core\Api\CardService\Merchant\Model\Merchant;
use App\Domain\Core\Job\Base\AbstractJob;
use App\Domain\Installment\Entities\MonthPaid;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class MonthPaidJobs extends AbstractJob
{
    private MonthPaid $monthPaid;
    private Merchant $merchant;

    public function __construct(MonthPaid $monthPaid)
    {
        $this->monthPaid = $monthPaid;
        $this->merchant = new Merchant();

    }

    public function withdraw(array $tokens, Payable $payable)
    {
        $transaction_id = $this->merchant->create($payable->amount(), $payable->account_id());
        $this->merchant->pre_confirm($this->monthPaid->plastic_token(), $transaction_id);
        $this->merchant->confirm();
    }

    public function handle()
    {
        try {

        } catch (\Exception $exception) {

        }
    }
}
