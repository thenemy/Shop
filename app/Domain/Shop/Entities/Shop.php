<?php


namespace App\Domain\Shop\Entities;


use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Media\Traits\MediaTrait;
use App\Domain\Core\Slug\Traits\Sluggable;
use App\Domain\Shop\Builders\ShopBuilder;
use App\Domain\User\Entities\User;

class Shop extends Entity
{
    use Sluggable, MediaTrait;

    protected $table = "shops";

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, "id");
    }

    public function newEloquentBuilder($query): ShopBuilder
    {
        return new ShopBuilder($query);
    }

    public function slugSources(): array
    {
        return [
            'slug' => 'name'
        ];
    }

    public function getMediaPathStorages(): string
    {
        return "shop/files";
    }

    public function getLogoAttribute($value): \App\Domain\Core\Media\Models\Media
    {
        return $this->getMedia("logo", $value);
    }

    public function setLogoAttribute($value)
    {
        $this->setMedia("logo", $value, $this->id);
    }

    public function setImageAttribute($value)
    {
        $this->setMedia("image", $value, $this->id);
    }

    public function getImageAttribute($value): \App\Domain\Core\Media\Models\Media
    {
        return $this->getMedia("image", $value);
    }

    public function getDirectorPassportAttribute($value): \App\Domain\Core\Media\Models\Media
    {
        return $this->getMedia("director_passport", $value);
    }

    public function setDirectorPassportAttribute($value)
    {
        $this->setMedia("director_passport", $value, $this->id);
    }

    public function getLicenceAttribute($value): \App\Domain\Core\Media\Models\Media
    {
        return $this->getMedia("licence", $value);
    }

    public function setLicenceAttribute($value)
    {
        $this->setMedia("licence", $value, $this->id);
    }

    public function getDocumentAttribute($value): \App\Domain\Core\Media\Models\Media
    {
        return $this->getMedia("document", $value);
    }

    public function setDocumentAttribute($value)
    {
        $this->setMedia("document", $value, $this->id);
    }

    public function getNameUserAttribute()
    {
        return $this->user->name;
    }

    public function getPhoneUserAttribute()
    {
        return $this->user->phone;
    }

    public function mediaKeys(): array
    {
        return [
            'logo',
            'image',
            "director_passport",
            "licence",
            "document",
        ];
    }
}
