<?php

namespace App\Domain\Delivery\Services;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Main\Services\BaseService;
use App\Domain\Delivery\Entities\AvailableCities;
use Illuminate\Support\Facades\DB;

class AvailableCitiesService extends BaseService
{

    public function getEntity(): Entity
    {
        return AvailableCities::new();
    }


}
