<?php


namespace App\Domain\Location\Entities;


use App\Domain\Core\Main\Entities\Entity;

class Location extends Entity
{
    protected $table = 'locations';

    public function location(){
        return $this->belongsTo(User::class);
    }
}
