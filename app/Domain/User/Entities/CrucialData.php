<?php

namespace App\Domain\User\Entities;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Media\Traits\MediaTrait;
use Illuminate\Support\Carbon;

class CrucialData extends Entity
{
    use MediaTrait;

    protected $table = "crucial_data";

    public function getNameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function getUserPassportAttribute($value): \App\Domain\Core\Media\Models\Media
    {
        return $this->getMedia('user_passport', $value, $this->id);
    }

    public function setUserPassportAttribute($value)
    {
        $this->setMedia("user_passport", $value, $this->id);
    }

    public function setPassportAttribute($value)
    {
        $this->setMedia('passport', $value, $this->id);
    }

    public function getPassportAttribute($value): \App\Domain\Core\Media\Models\Media
    {
        return $this->getMedia('passport', $value, $this->id);
    }

    public function getPassportReverseAttribute($value)
    {
        return $this->getMedia('passport_reverse', $value, $this->id);
    }

    public function setPassportReverseAttribute($value)
    {
        $this->setMedia('passport_reverse', $value, $this->id);
    }


    public function getMediaPathStorages(): string
    {
        return 'crucial_data';
    }

    public function mediaKeys(): array
    {
        return [
            'user_passport',
            'passport',
            'passport_reverse'
        ];
    }
}
