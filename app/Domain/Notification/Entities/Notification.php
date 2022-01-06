<?php


namespace App\Domain\Notification\Entities;


use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;

class Notification extends Entity
{
    use Translatable;
    protected $table = 'notifications';


    public function setTextAttribute($value)
    {
        $this->setTranslate('message', $value);
    }

    public function getTextAttribute()
    {
        $this->getTranslatable('message');
    }
}
