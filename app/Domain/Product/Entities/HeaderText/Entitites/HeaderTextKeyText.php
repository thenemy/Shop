<?php


namespace App\Domain\Product\Entities\HeaderText\Entitites;


use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;

class HeaderTextKeyText extends Entity
{
    use Translatable;
    protected $table = 'header_text_key_texts';


    public function headerTextKeyText(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(HeaderText::class);
    }

    public function setTextAttribute($value)
    {
        $this->setTranslate('text', $value);
    }

    public function getTextAttribute()
    {
        $this->getTranslatable('text');
    }

    public function getColumns(): array
    {
        // TODO: Implement getColumns() method.
    }

    public function livewireComponents(): array
    {
        // TODO: Implement livewireComponents() method.
    }

    public function getTableRows(): array
    {
        // TODO: Implement getTableRows() method.
    }
}
