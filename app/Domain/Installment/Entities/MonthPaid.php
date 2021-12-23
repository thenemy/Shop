<?php

namespace App\Domain\Installment\Entities;

use App\Domain\Core\Main\Entities\Entity;

class MonthPaid extends Entity
{
    protected $table = "month_paid";

    public function takenCredit(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TakenCredit::class, "taken_credit_id");
    }

}
