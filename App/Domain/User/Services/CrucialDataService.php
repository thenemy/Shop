<?php

namespace App\Domain\User\Services;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Services\BaseService;
use App\Domain\User\Entities\CrucialData;

class CrucialDataService extends BaseService
{

    public function getEntity(): Entity
    {
        return new CrucialData();
    }
}
