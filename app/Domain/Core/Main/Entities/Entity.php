<?php


namespace App\Domain\Core\Main\Entities;


//create several types

// header will be livewire for asynchornious
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function getClassNameAttribute(): string
    {
        $array = explode("\\", get_class($this));
        return end($array);
    }
}

