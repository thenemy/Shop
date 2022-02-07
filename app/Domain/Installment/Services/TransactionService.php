<?php

namespace App\Domain\Installment\Services;

use App\Domain\Installment\Entities\MonthPaid;
use App\Domain\Installment\Entities\Transaction;
use App\Domain\Installment\Payable\MonthPaidPayable;

class TransactionService
{
    public function create(MonthPaidPayable $paid)
    {
        Transaction::create(
            [
                'month_id' => $paid->id,
                'transaction_id' => $paid->getTransaction(),
                "amount" => $paid->amount(),
            ]
        );
    }
}
