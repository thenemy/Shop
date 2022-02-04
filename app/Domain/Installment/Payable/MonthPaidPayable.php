<?php

namespace App\Domain\Installment\Payable;

use App\Domain\Core\Api\CardService\Interfaces\Payable;
use App\Domain\Core\Api\CardService\Traits\HasTransaction;
use App\Domain\Installment\Entities\MonthPaid;
use App\Domain\Installment\Entities\Transaction;
use App\Domain\Installment\Interfaces\PurchaseStatus;
use App\Domain\Installment\Services\TransactionService;
use Illuminate\Support\Collection;

class MonthPaidPayable extends MonthPaid implements Payable
{
    use HasTransaction;

    public function amount()
    {
        return $this->must_pay - $this->paid;
    }

    public function account_id()
    {
        return $this->id;
    }

    public function getTokens(): Collection
    {
        return $this->takenCredit->getPlasticTokens();
    }


    public function finishTransaction(array $confirm): bool
    {
        $last = $this->takenCredit->monthPaid()->orderBy("month", "DESC")->first();
        $current = $this->takenCredit->monthPaid()->whereDate('month', '=', now())->first();
        if ($last->id == $this->id) {
            $this->takenCredit->status = PurchaseStatus::FINISHED;
        } else if ($current->id == $this->id) {
            $this->takenCredit->status = PurchaseStatus::ACCEPTED;
        }
        $this->takenCredit->save();
        $transaction = new TransactionService();
        $transaction->create($this);
        return true;
    }

    public function taken_id()
    {
        return $this->taken_credit_id;
    }

    public function check(): bool
    {
        return abs($this->takenCredit->status) == PurchaseStatus::ACCEPTED;
    }
}
