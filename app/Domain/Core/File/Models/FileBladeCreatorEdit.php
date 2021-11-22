<?php

namespace App\Domain\Core\File\Models;

use App\Domain\Core\File\Abstracts\AbstractFileManagerBlade;

class FileBladeCreatorEdit extends AbstractFileManagerBlade
{

    protected function getPath(): string
    {
        return $this->pathMain . self::EDIT;
    }

    protected function getTemplatePath(): string
    {
        return self::FROM_EDIT;
    }
}
