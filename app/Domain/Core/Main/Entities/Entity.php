<?php


namespace App\Domain\Core\Main\Entities;


use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    public $timestamps = false;
    protected $guarded =["id"];
}
