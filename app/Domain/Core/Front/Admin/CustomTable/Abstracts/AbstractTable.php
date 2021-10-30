<?php


namespace App\Domain\Core\Front\Admin\CustomTable\Abstracts;


use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInterface;

abstract class AbstractTable implements TableInterface
{
    public $attributes;
    public $pagination;
    public function __construct($entities)
    {
        $this->pagination = $entities;
        $this->attributes = $entities->map(function ($item){
            return $this->getRows($item);
        });
    }
}
