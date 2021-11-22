<?php

namespace App\Domain\Category\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class CategoryBuilder extends BuilderEntity
{
    public function filterByNot($filter): CategoryBuilder
    {
        if (isset($filter["parent_id"])) {
            $this->where("parent_id", "!=", $filter["parent_id"]);
        }
        return $this;
    }

    public function filterBy($filter): CategoryBuilder
    {
        if (isset($filter["search"]) || isset($filter['name'])) {
            $search = $filter["search"] ?? $filter["name"];
            $this->where("name", "LIKE", "%" . $search . "%");
        }
        return $this;
    }

    public function deleteIn(array $keys)
    {
        return $this->whereIn("id", $keys)->delete();
    }
}
