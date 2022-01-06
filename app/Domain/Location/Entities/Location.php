<?php


namespace App\Domain\Location\Entities;


use App\Domain\Core\Main\Entities\Entity;
use App\Domain\Order\Entities\Order;
use App\Models\User;

class Location extends Entity
{
    protected $table = 'locations';

    public function userLocation(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class);
    }
    public function location(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Order::class);
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
