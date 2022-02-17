<?php

namespace App\Domain\Product\HeaderText\Entities;

use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Product\HeaderText\Builders\HeaderKeyValueBuilder;

class HeaderKeyValue extends Entity
{
    use Translatable;

    protected $guarded = null;
    protected $fillable = [
        'key',
        'header_product_id',
        'value'];
    protected $table = "header_key_value";

    public function newEloquentBuilder($query)
    {
        return new HeaderKeyValueBuilder($query);
    }

    public function getValueAttribute(): ?\Illuminate\Support\Collection
    {
        return $this->getTranslations("value");
    }

    public function getKeyAttribute(): ?\Illuminate\Support\Collection
    {
        return $this->getTranslations("key");
    }

    public function getKeyCurrentAttribute()
    {
        return $this->getTranslatable("key");
    }

    public function getValueCurrentAttribute()
    {
        return $this->getTranslatable("value");
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

    public function toArray()
    {
        return [
            "key" => $this->key_current,
            "value" => $this->value_current
        ];
    }
}
