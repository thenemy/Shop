<?php

namespace App\Domain\Installment\Entities;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Installment\Builders\PlasticTakenCreditBuilder;
use App\Domain\User\Traits\PlasticCardTrait;

class PlasticCardTakenCredit extends Entity
{
    use PlasticCardTrait;
    protected $table = 'plastic_card';
    protected $guarded = [
        'date_number',
    ];
    public function newEloquentBuilder($query)
    {
        return PlasticTakenCreditBuilder::new($query);
    }

    public function takenCredit(){
        return $this->belongsToMany(TakenCredit::class,
        'plastic_card_taken_credit',
        "plastic_id",
        "taken_credit_id");

    }
}
