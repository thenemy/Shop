<?php

namespace App\Domain\Installment\Entities;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\CreditProduct\Entity\Credit;

use App\Domain\Installment\Builders\TakenCreditBuilder;
use App\Domain\Order\Entities\Purchase;
use App\Domain\User\Entities\PlasticCard;
use App\Domain\User\Entities\UserCreditData;

/**
 * made tomorrow the installment
 */
class TakenCredit extends Entity
{
    public $timestamps = true;
    protected $table = "taken_credits";

    public function newEloquentBuilder($query)
    {
        return TakenCreditBuilder::new($query);
    }

    public function userData(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UserCreditData::class,
            "user_credit_data_id");
    }

    public function plastic(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PlasticCard::class,
            "plastic_id");
    }

    public function credit(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Credit::class, "credit_id");
    }

    public function purchase(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Purchase::class, "purchase_id");
    }

    public static function getRules(): array
    {
        return [

        ];
    }
}
