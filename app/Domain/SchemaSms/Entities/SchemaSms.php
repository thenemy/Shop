<?php

namespace App\Domain\SchemaSms\Entities;

use App\Domain\Core\Main\Entities\Entity;
use App\Domain\SchemaSms\Interfaces\SchemaSmsType;

class SchemaSms extends Entity implements SchemaSmsType
{
    protected $table = "schema_sms";

}
