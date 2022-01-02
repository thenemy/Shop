<?php

namespace App\Domain\User\Front\Dynamic;

use App\Domain\User\Services\PlasticCardSuretyService;

class SuretyPlasticCardDynamic extends PlasticCardDynamic
{

    public static function getBaseService(): string
    {
        return PlasticCardSuretyService::new();
    }
}
