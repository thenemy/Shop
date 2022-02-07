<?php

namespace App\Domain\Installment\Entities;

use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;

class TakenCreditError extends Entity
{
    use Translatable;

    protected $table = "taken_credit_error";
    public $incrementing = false;

    public function taken(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TakenCredit::class, "id");
    }

    public function getReasonAttribute(): ?\Illuminate\Support\Collection
    {
        return $this->getTranslations("reason");
    }

    public function setReasonAttribute($value)
    {
        $this->setTranslate("reason", $value);
    }
}
