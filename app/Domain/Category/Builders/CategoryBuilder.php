<?php

namespace App\Domain\Category\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class CategoryBuilder extends BuilderEntity
{
    public function filterBy($filter): CategoryBuilder
    {
        parent::filterBy($filter);
        if (isset($filter['parent_id'])) {
            $this->where($this->getParent(), '=', $filter['parent_id'])
                ->where("id", "!=", $filter['parent_id']);
        }

        return $this;
    }

    public function filterByNot($filter): CategoryBuilder
    {

        if (isset($filter["parent_id"])) {
            $this->where(function ($builder) use ($filter) {
                $builder->where(function (BuilderEntity $builder) use ($filter) {
                    return $builder->whereNull($this->getParent())
                        ->where("id", "!=", $filter["parent_id"]);
                })->orWhere($this->getParent(), "!=", $filter["parent_id"]);
            });
        }

        return $this;
    }

    protected function getSearch(): string
    {
        return "name";
    }
}
