<?php

namespace App\Domain\Installment\Entities;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Installment\Builders\MonthPaidBuilder;
use App\Domain\Installment\Interfaces\MonthPaidInterface;

class MonthPaid extends Entity implements MonthPaidInterface
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

    public function getPlasticToken()
    {
        return $this->takenCredit->plastic->card_token;
    }
}
