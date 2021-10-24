<?php


namespace App\Domain\Shop\Entities;


use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Slug\Traits\Sluggable;

class Shop extends Entity
{
   use Sluggable;

    public function slugSources(): array
    {
       return [
           'slug' =>'name'
       ];
    }
}
