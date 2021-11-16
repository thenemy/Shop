<?php


namespace App\Domain\Credits\Entities;


use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Product\Product\Entities\Product;
 // take into account how much user is paid and how much is remained
class Credits extends Entity
{
    protected $table = 'categories';

    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_credits');
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
