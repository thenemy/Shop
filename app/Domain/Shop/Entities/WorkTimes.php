<?php

namespace App\Domain\Shop\Entities;

use App\Domain\Core\Main\Entities\Entity;

class WorkTimes extends Entity
{
    protected $table = 'work_times';
    public $incrementing = false;

    public function shopAddress(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ShopAddress::class, "id");
    }
}
