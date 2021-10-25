<?php


namespace App\Domain\Order\Entities;


use App\Domain\Core\Main\Entities\Entity;

class Order extends Entity
{

    public $guarded = [];
    protected $table = "orders";


}
