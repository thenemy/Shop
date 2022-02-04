<?php

namespace App\Domain\Installment\Entities;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Installment\Builders\TransactionBuilder;

class Transaction extends Entity
{
    protected $table = "transactions";
    public $timestamps = true;
    public function monthPaid()
    {
        return $this->belongsTo(MonthPaid::class, "month_id");
    }
    public function newEloquentBuilder($query)
    {
        return new TransactionBuilder($query);
    }
}
