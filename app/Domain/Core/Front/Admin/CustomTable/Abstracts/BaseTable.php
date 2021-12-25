<?php

namespace App\Domain\Core\Front\Admin\CustomTable\Abstracts;

use App\Domain\Core\Front\Admin\Attributes\Models\Column;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInterface;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Interfaces\HtmlInterface;

abstract class BaseTable implements TableInterface, LivewireAdditionalFunctions, HtmlInterface
{
    public $columns;
    public $list;
    public $paginate;

    public function __construct($entities = [])
    {
        $this->list = $entities;
        $this->paginate = $entities;
        $this->columns = $this->getColumns();
    }

    public function generateFunctions(): string
    {
        $str_functions = "";
        foreach ($this->getColumns() as $item) {
            $str_functions = $str_functions . " " . $item->generateFunction();
        }
        return $str_functions;
    }

    public function generateHtml(): string
    {
        return sprintf('<x-helper.table.table :table="$table" :optional="$optional" turn_off="%s">
        %s </x-helper.table.table>', $this->turnOffActions(), $this->slot());
    }

    public function turnOffActions(): string
    {
        return "";
    }

    public function slot(): string
    {
        return "";
    }
}
