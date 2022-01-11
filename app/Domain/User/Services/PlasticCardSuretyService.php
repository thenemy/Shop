<?php

namespace App\Domain\User\Services;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Services\BaseService;
use App\Domain\User\Entities\PlasticCard;
use App\Domain\User\Entities\PlasticCardSurety;

class PlasticCardSuretyService extends PlasticCardService
{

    public function getEntity(): Entity
    {
        return new PlasticCardSurety();
    }
}
