<?php

namespace App\Domain\Core\Api\CardService\Interfaces;

use Illuminate\Support\Collection;

interface Payable
{
    public function amount();

    public function account_id();

    public function taken_id();

    public function getTokens(): Collection;

    public function setTransaction(int $transaction_id);

    public function getTransaction();

    public function finishTransaction(array $confirm): bool;
}
