<?php

namespace App\Domain\Installment\Entities;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\CreditProduct\Entity\Credit;

use App\Domain\Order\Entities\Order;
use App\Domain\User\Entities\PlasticUserCard;
use App\Domain\User\Entities\UserCreditData;

class TakenCredit extends Entity
{
    protected $table = "taken_credits";

    public function userData(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UserCreditData::class,
            "user_credit_data_id");
    }

    public function plastic(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PlasticUserCard::class,
            "plastic_id");
    }

    public function credit(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Credit::class, "credit_id");
    }

    public function order(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Order::class, "");
    }

}
