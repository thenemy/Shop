<?php

namespace App\Domain\Core\File\Models\Main;
use App\Domain\Core\File\Abstracts\AbstractFileManager;
use App\Domain\Core\File\Abstracts\AbstractFileManagerBlade;
use App\Domain\Core\File\Interfaces\BladeCreatorInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;


class FileBladeCreatorIndex extends AbstractFileManagerBlade
{

    protected function getPath(): string
    {
        return $this->pathMain . self::INDEX;
    }

    protected function getTemplatePath(): string
    {
        return self::FROM_INDEX;
    }

}
