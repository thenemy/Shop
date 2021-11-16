<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Abstracts;


use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInterface;

abstract class AbstractTable implements TableInterface
{
    public $columns;
    public $list;

    public function __construct($entities)
    {
        $this->list = $entities;
        $this->columns = $this->getColumns();
    }

}
