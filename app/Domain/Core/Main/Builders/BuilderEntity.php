<?php

namespace App\Domain\Core\Main\Builders;

use App\Domain\Category\Builders\CategoryBuilder;
use App\Domain\Core\Main\Interfaces\BuilderInterface;
use Illuminate\Database\Eloquent\Builder;

abstract class BuilderEntity extends Builder implements BuilderInterface
{
    protected function getParent():string{
        return  "parent_id";
    }
    protected function getSearch():string {
        return  "search";
    }
    public function filterByNot($filter): CategoryBuilder
    {
        if (isset($filter["parent_id"])) {
            $this->where(function (BuilderEntity $builder) use ($filter) {
                return $builder->whereNull($this->getParent())
                    ->where("id", "!=", $filter["parent_id"]);
            })->orWhere($this->getParent(), "!=", $filter["parent_id"]);
        }
        return $this;
    }

    public function filterBy($filter): CategoryBuilder
    {
        if (isset($filter["search"])) {
            $search = $filter["search"];
            $this->where($this->getSearch(), "LIKE", "%" . $search . "%");
        }
        if (isset($filter['parent_id'])) {
            $this->where($this->getParent(), '=', $filter['parent_id'])
                ->where("id", "!=", $filter['parent_id']);
        }
        return $this;
    }

    public function deleteIn(array $keys)
    {
        return $this->whereIn("id", $keys)->delete();
    }
}
