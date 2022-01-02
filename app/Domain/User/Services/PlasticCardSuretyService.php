<?php

namespace App\Domain\User\Services;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Services\BaseService;
use App\Domain\User\Entities\PlasticCard;

class PlasticCardSuretyService extends BaseService
{

    public function getEntity(): Entity
    {
        return new PlasticCard();
    }
}
