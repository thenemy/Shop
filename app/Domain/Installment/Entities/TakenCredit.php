<?php

namespace App\Domain\Installment\Entities;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\CreditProduct\Entity\Credit;

use App\Domain\Installment\Builders\TakenCreditBuilder;
use App\Domain\Installment\Interfaces\TakenCreditRelationInterface;
use App\Domain\Order\Entities\Purchase;
use App\Domain\Order\Entities\UserPurchase;
use App\Domain\User\Entities\PlasticCard;
use App\Domain\User\Entities\UserCreditData;
use App\Domain\User\Traits\HasUserRelationship;

/**
 * made tomorrow the installment
 */
class TakenCredit extends Entity implements TakenCreditRelationInterface
{
    use HasUserRelationship;

    public $timestamps = true;

    protected $table = "taken_credits";
    public function paid()
    {
        $this->is_paid = true;
        $this->save();
    }
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

    public function monthPaid()
    {
        return $this->hasMany(MonthPaid::class, 'taken_credit_id');
    }

    public function alreadyPaid()
    {
        return $this->monthPaid()->sum('paid');
    }

    public function allToPay()
    {
        return $this->monthPaid()->sum('must_pay');
    }

    public function credit(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Credit::class, "credit_id");
    }

    public function purchase(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UserPurchase::class, "purchase_id");
    }

    public static function getRules(): array
    {
        return [

        ];
    }
}
