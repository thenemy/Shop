<?php

namespace App\Domain\Product\HeaderText\Entities;

use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;

class HeaderKeyValue extends Entity
{
    use Translatable;

    protected $table = "header_key_value";

    public function __construct(array $attributes = [])
    {
        $this->attributes['key_ru'] = $this->getKeyAttribute()['ru'] ?? "";
        $this->attributes['key_en'] = $this->getKeyAttribute()['en'] ?? "";
        $this->attributes['key_uz'] = $this->getKeyAttribute()['uz'] ?? "";
        $this->attributes['value_ru'] = $this->getValueAttribute()['ru'] ?? "";
        $this->attributes['value_en'] = $this->getValueAttribute()['en'] ?? "";
        $this->attributes['value_uz'] = $this->getValueAttribute()['uz'] ?? "";
        parent::__construct($attributes);
    }


    public function getValueAttribute(): ?\Illuminate\Support\Collection
    {
        return $this->getTranslations("value");
    }

    public function getKeyAttribute(): ?\Illuminate\Support\Collection
    {
        return $this->getTranslations("key");
    }

    public function setKeyAttribute($value)
    {
        $this->setTranslate("key", $value);
    }

    public function setValueAttribute($value)
    {
        $this->setTranslate("value", $value);
    }

    public static function getRules(): array
    {
        return [
            "key_ru",
            "key_en",
            "key_uz",
            "value_ru",
            "value_en",
            "value_uz",
        ];
    }
}
