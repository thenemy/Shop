<?php

namespace App\Domain\User\Entities;

class PlasticCardSurety extends PlasticCard
{
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Surety::class,
            "plastic_surety_cards",
            "plastic_id",
            "surety_id");
    }
}
