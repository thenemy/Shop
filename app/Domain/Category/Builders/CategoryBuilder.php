<?php

namespace App\Domain\Category\Builders;

use Illuminate\Database\Eloquent\Builder;

class CategoryBuilder extends Builder
{
    public function filterBy(): CategoryBuilder
    {
        return $this;
    }
}
