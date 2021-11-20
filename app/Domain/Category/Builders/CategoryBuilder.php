<?php

namespace App\Domain\Category\Builders;

use Illuminate\Database\Eloquent\Builder;

class CategoryBuilder extends Builder
{
    public function filterBy($filter): CategoryBuilder
    {
        if (isset($filter["search"]) || isset($filter['name'])) {
            $search = $filter["search"] ?? $filter["name"];
            $this->where("name", "LIKE", "%". $search . "%");
        }
        return $this;
    }
}
