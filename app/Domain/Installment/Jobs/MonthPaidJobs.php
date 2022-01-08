<?php

namespace App\Domain\Installment\Jobs;

use App\Domain\Core\Api\CardService\Error\CardServiceError;
use App\Domain\Core\Api\CardService\Interfaces\Payable;
use App\Domain\Core\Api\CardService\Merchant\Model\Merchant;
use App\Domain\Core\Api\CardService\Model\WithdrawMoney;
use App\Domain\Core\BackgroundTask\Base\AbstractJob;
use App\Domain\Installment\Entities\MonthPaid;
use App\Domain\Installment\Entities\TimeScheduleTransactions;
use App\Domain\Installment\Payable\MonthPaidPayable;
use App\Domain\Installment\Services\TimeScheduleService;
use App\Domain\User\Entities\PlasticCard;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use PHPUnit\Exception;

class MonthPaidJobs extends AbstractJob
{
    private MonthPaidPayable $monthPaid;
    private WithdrawMoney $withdrawMoney;

    public function __construct(MonthPaidPayable $monthPaid)
    {
        $this->monthPaid = $monthPaid;
        $this->withdrawMoney = new WithdrawMoney($monthPaid);

    }
    /// handle logic when it goes to FailedToWithdraw dispatch
    ///  what has to be the condition for this case
    public function withdraw()
    {
        $is_paid = false;
        $taken_id = $this->monthPaid->taken_credit_id;
        foreach ($this->monthPaid->getTokens() as $token) {
            try {
                if ($is_paid = $this->withdrawMoney->withdraw($token)) {
                    break;
                }
            } catch (CardServiceError $exception) {
                TimeScheduleService::failed(PlasticCard::byToken($token)->first()->pan,
                    $exception->getMessage(),
                    $taken_id);
            }
        }
        TimeScheduleService::failedAll($taken_id);
        if (!$is_paid) {
            FailedToWithdraw::dispatch($this->monthPaid);
        }
    }

    public function handle()
    {
        try {
            $this->withdraw();
        } catch (\Exception $exception) {

        }
    }
}
