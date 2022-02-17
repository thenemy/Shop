<?php

namespace App\Domain\Comments\Entities;

use App\Domain\Core\Main\Entities\Entity;

class MarkProduct extends Entity
{
    protected $table = "mark_product";
    protected $fillable = [
      "mark",
      "user_id",
      "product_id"
    ];
    public $incrementing = false;
}
