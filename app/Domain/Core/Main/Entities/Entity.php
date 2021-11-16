<?php


namespace App\Domain\Core\Main\Entities;



//create several types

// header will be livewire for asynchornious
use Illuminate\Database\Eloquent\Model;

abstract class Entity extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    // ColumnClass (real_type_column , name_column , type_column_in_list)
    abstract public function getColumns(): array;

    // Search Component , Filter Component   -+
    abstract public function livewireComponents(): array;

    // column_name => row_name
    abstract public function getTableRows(): array;
}

