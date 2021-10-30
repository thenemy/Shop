<?php


namespace App\Domain\Credits\Services;


use App\Domain\Core\Main\Services\BaseService;
use App\Domain\Credits\Entities\Credits;

class CreditsService extends BaseService
{

    public function getEntity()
    {
        return new Credits();
    }
}
