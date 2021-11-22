<?php

namespace App\Domain\Core\Main\Builders;

use App\Domain\Core\Main\Interfaces\BuilderInterface;
use Illuminate\Database\Eloquent\Builder;

abstract  class BuilderEntity extends Builder implements BuilderInterface
{

}
