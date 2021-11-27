<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Abstracts;


use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInterface;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\LivewireFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;

abstract class AbstractTable implements TableInterface, LivewireAdditionalFunctions
{
    public $columns;
    public $list;
    public $paginate;

    public function __construct($entities= [])
    {
        $this->list = $entities;
        $this->paginate = $entities;
        $this->columns = $this->getColumns();
    }

    public function generateFunctions(): string
    {
        $str_functions = "";
        foreach ($this->getColumns() as $item) {
            $str_functions = $str_functions . " " . $item->generateFunction();}
        return $str_functions;
    }
}
