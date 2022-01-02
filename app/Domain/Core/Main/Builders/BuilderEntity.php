<?php

namespace App\Domain\Core\Main\Builders;

use App\Domain\Category\Builders\CategoryBuilder;
use App\Domain\Core\Main\Interfaces\BuilderInterface;
use Illuminate\Database\Eloquent\Builder;

abstract class BuilderEntity extends Builder implements BuilderInterface
{
    protected function getParent(): string
    {
        return "parent_id";
    }

    protected function getSearch(): string
    {
        return "search";
    }

    public function filterByNot($filter)
    {
        return $this;
    }


    public function filterByIn($filter)
    {
        if (isset($filter['id'])) {
            $this->whereIn('id', $filter['id']);
        }
        return $this;
    }
    public function filterByNotIn($filter)
    {
        if (isset($filter['id'])) {
            $this->whereNotIn('id', $filter['id']);
        }
        return $this;
    }

    public function filterBy($filter)
    {
        if (isset($filter[$this->getSearch()])) {
            $filter['search'] = $filter[$this->getSearch()];
        }
        if (isset($filter["search"])) {
            $search = $filter["search"];
            $this->where($this->getSearch(), "LIKE", "%" . $search . "%");
        }
        if (isset($filter[$this->getParent()])) {
            $this->where($this->getParent(), '=', $filter[$this->getParent()]);
        }

        return $this;
    }

    public function deleteIn(array $keys)
    {
        return $this->whereIn("id", $keys)->delete();
    }

    public static function new($query)
    {
        $class = get_called_class();
        return new $class($query);
    }
}
