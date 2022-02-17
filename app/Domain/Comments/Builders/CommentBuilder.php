<?php

namespace App\Domain\Comments\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class CommentBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "message";
    }

    public function show($product_id)
    {
        return $this->where("product_id", $product_id)->where("status", true);
    }
}
