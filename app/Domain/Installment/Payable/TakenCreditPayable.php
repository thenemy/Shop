<?php

namespace App\Domain\Installment\Payable;

use App\Domain\Core\Api\CardService\Interfaces\Payable;
use App\Domain\Core\Api\CardService\Traits\HasTransaction;
use App\Domain\Installment\Entities\TakenCredit;
use Illuminate\Support\Collection;

class TakenCreditPayable extends TakenCredit implements Payable
{
    use HasTransaction;

    public function amount()
    {
        return $this->initial_price;
    }

    public function account_id()
    {
        return $this->id;
    }

    public function getTokens(): Collection
    {
        return $this->getPlasticTokens();
    }


    public function finishTransaction(array $confirm):bool
    {
        //write logic to finish transaction
        // check confirm is everything exists and etc
    }

    public function taken_id()
    {
        return $this->id;
    }
}
