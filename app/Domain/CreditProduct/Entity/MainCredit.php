<?php

namespace App\Domain\CreditProduct\Entity;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Interfaces\RuleInterface;
use App\Domain\CreditProduct\Builders\MainCreditBuilder;

class MainCredit extends Entity
{
    protected $table = "main_credits";

    public function newEloquentBuilder($query)
    {
        return MainCreditBuilder::new($query);
    }

    public function credits(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Credit::class, "main_credit_id");
    }

    static public function getRules(): array
    {
        return [
            "name" => "required",
            "helper_text" => "required",
            "initial_percent" => "required|numeric"
        ];
    }
}
