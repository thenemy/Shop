<?php


namespace App\Domain\Order\Entities;


use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Location\Entities\Location;
use App\Domain\Product\Entities\Product;
use App\Models\User;

class Order extends Entity
{

    public $guarded = [];
    protected $table = "orders";
    public function userOrder(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, "basket");
    }
    public function productOrder(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class, "id");
    }
    public function locationOrder(){
        return $this->belongsTo(Location::class,'order_id');
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
