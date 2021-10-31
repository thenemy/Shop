<?php


namespace App\Domain\Product\Entities;


use App\Domain\Core\Main\Entities\Entity;

class ProductInfo extends Entity
{
    public function productInfo(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
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
