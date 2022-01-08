<?php

namespace App\Domain\User\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class PlasticCardBuilder extends BuilderEntity
{
    public function byToken($token): PlasticCardBuilder
    {
        return $this->where('card_token', $token);
    }

    protected function getSearch(): string
    {
        return "card_number";
    }
}
