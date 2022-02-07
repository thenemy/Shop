<?php

namespace App\Domain\Comments\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class CommentBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "message";
    }
}
