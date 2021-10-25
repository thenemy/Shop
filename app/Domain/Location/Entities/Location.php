<?php


namespace App\Domain\Location\Entities;


use App\Domain\Core\Main\Entities\Entity;
use App\Models\User;

class Location extends Entity
{
    protected $table = 'locations';

    public function location(){
        return $this->hasOne(User::class);
    }
}
