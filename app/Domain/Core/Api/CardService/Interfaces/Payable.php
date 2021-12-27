<?php

namespace App\Domain\Core\Api\CardService\Interfaces;

interface Payable
{
    public function amount();

    public function account_id();

    public function tokens_array();

    public function setTransaction(int $transaction_id);

    public function getTransaction();
}
