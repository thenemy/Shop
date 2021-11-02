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
// there is will be one base controller which will have all necessary data
// so it has to accept only the name class of entity which will be have two required function 'getColumns' and 'getTableRows'
// Therefore, in index it will initiate CategoryTable(name class of entity :: all())
// it will check if the file is created if it is not it will create the blade, and write there basics component
// Form elements will be in one file. The loop in the form blade  will initiate name, value if exists, OpenButton all relations
// must made one more component to initiate key values
// There will be extension of this controller for nested Controller
// There will be created livewire components dynamically
//
