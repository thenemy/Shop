<?php

namespace App\Domain\Core\File\Models\Open;

use App\Domain\Core\File\Models\Main\FileBladeCreatorIndex;

class FileBladeCreatorOpenIndex extends FileBladeCreatorIndex
{
    protected function getTemplatePath(): string
    {
        return self::FROM_INDEX_OPEN;
    }
}
