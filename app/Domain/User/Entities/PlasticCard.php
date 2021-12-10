<?php

namespace App\Domain\User\Entities;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\UuidKey\Traits\HasUuidKey;
use App\Domain\Installment\Entities\TakenCredit;
use App\Domain\User\Builders\PlasticCardBuilder;
use App\Domain\User\Traits\HasUserRelationship;

class PlasticCard extends Entity
{
    use HasUserRelationship, HasUuidKey;

    protected $table = 'plastic_card';

    public function newEloquentBuilder($query): PlasticCardBuilder
    {
        return new PlasticCardBuilder($query);
    }

    public static function getRules(): array
    {
        return [
            'card_number' => "required",
            "date_number" => "required",
            "code" => "required"
        ];
    }
}