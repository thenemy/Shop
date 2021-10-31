<?php


namespace App\Domain\Product\Entities\HeaderComponent\TextComponent\Entities;


use App\Domain\Core\Language\Traits\Translatable;
use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Core\Media\Traits\MediaTrait;

class AddTextComponent extends Entity
{
    use Translatable;

    protected $table = 'add_text_components';

    public function addTextComponent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TextComponent::class,'id');
    }

    public function setAddTextComponent($value)
    {
        $this->setTranslate('text', $value);
    }

    public function getAddTextComponent($value): ?string
    {
        return $this->getTranslatable('text');
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
