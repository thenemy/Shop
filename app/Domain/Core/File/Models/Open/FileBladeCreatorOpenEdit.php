<?php

namespace App\Domain\Core\File\Models\Open;

use App\Domain\Core\File\Models\Main\FileBladeCreatorEdit;

class FileBladeCreatorOpenEdit extends FileBladeCreatorEdit
{
    protected function getTemplatePath(): string
    {
        return self::FROM_EDIT_OPEN;
    }
}
