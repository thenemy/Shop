<?php

namespace App\Domain\Core\Front\Admin\CustomTable\Traits;

//used with combination  TableFilterByInterface and ArrayHandle
trait TableFilterBy
{
    public function filterByString(): string
    {
        return ":filterBy=" . $this->arrayToString($this->filterByData());
    }
    abstract function filterByData():array;
    abstract function arrayToString(array $data):string;
}
