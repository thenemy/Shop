<?php


namespace App\Domain\Product\Entities\HeaderText\Entitites;


use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;

class HeaderTextValueLink extends Entity
{
    use Translatable;
    protected $table = 'header_text_value_Links';


    public function headerTextValueLink(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(HeaderTextKeyText::class);
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
