<?php

namespace App\Domain\Core\Front\Admin\CustomTable\Traits;

//used with combination  TableFilterByInterface and ArrayHandle
use App\Domain\Core\Main\Traits\ArrayHandle;

trait TableFilterBy
{
    use ArrayHandle;
    public function filterByString(): string
    {
        return ":filterBy=" . $this->arrayToString($this->filterByData());
    }
    abstract function filterByData():array;
}
