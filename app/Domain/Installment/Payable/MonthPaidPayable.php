<?php

namespace App\Domain\Installment\Payable;

use App\Domain\Core\Api\CardService\Interfaces\Payable;
use App\Domain\Core\Api\CardService\Traits\HasTransaction;
use App\Domain\Installment\Entities\MonthPaid;
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
        // write logic for finishing transaction
    }

    public function taken_id()
    {
        return $this->taken_credit_id;
    }
}
