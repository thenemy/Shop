<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Abstracts;


use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInterface;

abstract class AbstractTable implements TableInterface
{
    public $columns;
    public $list;
    public $paginate;
    public function __construct($entities)
    {
        $this->list = $entities;
        $this->paginate = $entities;
        $this->columns = $this->getColumns();
    }

}
