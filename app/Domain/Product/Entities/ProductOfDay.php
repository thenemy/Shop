<?php


namespace App\Domain\Product\Entities;


use App\Domain\Core\Main\Entities\Entity;

class ProductOfDay extends Entity
{
    public function productOfDay(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'parent_id');
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
