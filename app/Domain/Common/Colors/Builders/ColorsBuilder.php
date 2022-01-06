<?php

namespace App\Domain\Common\Colors\Builders;

use App\Domain\Core\Main\Builders\BuilderEntity;

class ColorsBuilder extends BuilderEntity
{
    protected function getSearch(): string
    {
        return "color";
    }
}
