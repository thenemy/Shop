<?php

namespace App\Domain\Core\File\Models\Open;

use App\Domain\Core\File\Models\Main\FileBladeCreatorCreate;

class FileBladeCreatorOpenCreate extends FileBladeCreatorCreate
{
    protected function getTemplatePath(): string
    {
        return self::FROM_CREATE_OPEN;
    }
}
