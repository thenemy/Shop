<?php

namespace App\Domain\Installment\Jobs;

use App\Domain\Core\Api\CardService\Error\CardServiceError;
use App\Domain\Core\Api\CardService\Interfaces\Payable;
use App\Domain\Core\Api\CardService\Model\WithdrawMoney;
use App\Domain\Core\BackgroundTask\Base\AbstractJob;
use App\Domain\Installment\Interfaces\PurchaseStatus;
use App\Domain\Installment\Payable\MonthPaidPayable;
use App\Domain\Installment\Services\TimeScheduleService;
use App\Domain\User\Entities\PlasticCard;

// do we need to add token to the construct ?

class FailedToWithdraw extends AbstractJob implements PurchaseStatus
{
    const TIMES_TO_TAKE = 5;
    private WithdrawMoney $withdrawMoney;
    private MonthPaidPayable $payable;
    public function __construct(MonthPaidPayable $payable)
    {
        $this->withdrawMoney = new WithdrawMoney($payable);
        $this->payable = $payable;
    }

    public function handle()
    {
        $counter = 0;
        $numberCard = PlasticCard::byToken($this->withdrawMoney->getToken())->first()->pan;
        $taken_id = $this->withdrawMoney->getPayable()->account_id();
        $isWithdrawn = false;
        while ($counter <= self::TIMES_TO_TAKE) {
            try {
                sleep(60 * 60 * 2);
                $this->withdrawMoney->withdraw();
                TimeScheduleService::success($numberCard, $taken_id);
                $isWithdrawn = true;
                break;
            } catch (CardServiceError $exception) {
                $counter++;
                TimeScheduleService::failedLoop($numberCard, $exception->getMessage(), $taken_id);
            }
        }
        if(!$isWithdrawn){
            $this->payable->status = self::NOT_PAID;
            $this->payable->save();
        }
    }
}
