<?php

namespace App\Domain\Installment\Jobs;

use App\Domain\Core\Api\CardService\Error\CardServiceError;
use App\Domain\Core\Api\CardService\Interfaces\Payable;
use App\Domain\Core\Api\CardService\Model\WithdrawMoney;
use App\Domain\Core\BackgroundTask\Base\AbstractJob;
use App\Domain\Installment\Payable\MonthPaidPayable;
use App\Domain\Installment\Services\TimeScheduleService;
use App\Domain\User\Entities\PlasticCard;

// do we need to add token to the construct ?

class FailedToWithdraw extends AbstractJob
{
    const TIMES_TO_TAKE = 5;
    private WithdrawMoney $withdrawMoney;

    public function __construct(Payable $payable)
    {
        $this->withdrawMoney = new WithdrawMoney($payable);
    }

    public function handle()
    {
        $counter = 0;
        $numberCard = PlasticCard::byToken($this->withdrawMoney->getToken())->first()->pan;
        $taken_id = $this->withdrawMoney->getPayable()->account_id();
        while ($counter <= self::TIMES_TO_TAKE) {
            try {
                sleep(60 * 60 * 2);
                $this->withdrawMoney->withdraw();
                TimeScheduleService::success($numberCard, $taken_id);
                break;
            } catch (CardServiceError $exception) {
                $counter++;
                TimeScheduleService::failedLoop($numberCard, $exception->getMessage(), $taken_id);
            }
        }
    }
}
