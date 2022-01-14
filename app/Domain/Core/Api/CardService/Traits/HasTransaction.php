<?php

namespace App\Domain\Core\Api\CardService\Traits;

trait HasTransaction
{
    public function setTransaction(int $transaction_id)
    {
        $this->transaction_id = $transaction_id;
        $this->save();
    }

    public function getTransaction(): ?int
    {
        return $this->transaction_id;
    }
}
