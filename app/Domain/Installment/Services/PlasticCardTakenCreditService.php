<?php

namespace App\Domain\Installment\Services;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Installment\Entities\PlasticCardTakenCredit;
use App\Domain\User\Services\PlasticCardService;

class PlasticCardTakenCreditService extends PlasticCardService
{
    public function getEntity(): Entity
    {
        return new PlasticCardTakenCredit();
    }
    protected function attach($object, $object_data)
    {
        $object->takenCredit()->attach($object_data['taken_credit_id']);
    }
}
