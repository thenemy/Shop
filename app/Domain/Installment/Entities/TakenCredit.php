<?php

namespace App\Domain\Installment\Entities;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\CreditProduct\Entity\Credit;

use App\Domain\Installment\Builders\TakenCreditBuilder;
use App\Domain\Installment\Interfaces\PurchaseRelationInterface;
use App\Domain\Order\Entities\Purchase;
use App\Domain\Order\Entities\UserPurchase;
use App\Domain\User\Entities\PlasticCard;
use App\Domain\User\Entities\Surety;
use App\Domain\User\Entities\UserCreditData;
use App\Domain\User\Traits\HasUserRelationship;
use Illuminate\Support\Facades\DB;

/**
 * made tomorrow the installment
 */
class TakenCredit extends Entity implements PurchaseRelationInterface
{
    use HasUserRelationship;

    public $timestamps = true;


    protected $table = "taken_credits";

    public function paid()
    {
        $this->is_paid = true;
        $this->save();
    }

    public function saveAccept()
    {
        if ($this->status % 10 == self::WAIT_ANSWER && !$this->date_taken) {
            $this->date_taken = now();
            $this->status = self::ACCEPTED;
            $this->date_finish = now()->addMonths($this->monthPaid()->count());
            $this->save();
        }
    }

    public function reason()
    {
        return $this->hasOne(TakenCreditError::class, 'id');
    }

    public function newEloquentBuilder($query)
    {
        return TakenCreditBuilder::new($query);
    }

    public function getSaldoAttribute()
    {
        return $this->monthPaid()
            ->where("month", "<=", now())
            ->sum(DB::raw("paid - must_pay"));
    }

    public function getPlasticTokens(): \Illuminate\Support\Collection
    {
        $token = $this->plastic->card_token;
        $tokens = $this->surety ? $this->surety->getPlasticTokens() : collect([]);
        return $tokens->push($token)->reverse();
    }

    public function surety(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Surety::class, 'surety_id');
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

    public function getNumberMonthAttribute()
    {
        return $this->credit->month;
    }

    public function getMonthlyPaidAttribute()
    {
        return $this->monthPaid->first()->must_pay;
    }


    public static function getRules(): array
    {
        return [

        ];
    }
}
