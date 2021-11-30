<?php

namespace App\Domain\User\Entities;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Installment\Entities\TakenCredit;
use App\Domain\User\Traits\UserRelationship;

class PlasticUserCard extends Entity
{
    use UserRelationship;

    protected $table = 'plastic_user_cards';


    public function guarantor(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(TakenCredit::class, "guarantors",
            "plastic_id",
            "taken_credit_id"
        );
    }
}
