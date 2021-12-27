<?php

namespace App\Domain\Installment\Entities;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Installment\Builders\MonthPaidBuilder;

class MonthPaid extends Entity
{
    protected $table = "month_paid";

    public function newEloquentBuilder($query): MonthPaidBuilder
    {
        return new MonthPaidBuilder($query);
    }

    public function takenCredit(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TakenCredit::class, "taken_credit_id");
    }

    public function plastic_token()
    {
        return $this->takenCredit->plastic->card_token;
    }
}
