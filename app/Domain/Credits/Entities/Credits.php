<?php


namespace App\Domain\Credits\Entities;


use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Product\Entities\Product;

class Credits extends Entity
{
    protected $table = 'categories';

    public function credits(){
        return $this->hasMany(Product::class,'id');
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
