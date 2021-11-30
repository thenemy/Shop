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
    public function filterByNot($filter)
    {
        return $this;
    }

    public function filterBy($filter)
    {
        if (isset($filter["search"])) {
            $search = $filter["search"];
            $this->where($this->getSearch(), "LIKE", "%" . $search . "%");
        }

        return $this;
    }

    public function deleteIn(array $keys)
    {
        return $this->whereIn("id", $keys)->delete();
    }
}
