<?php

namespace App\Domain\Core\File\Models\Main;

use App\Domain\Core\File\Abstracts\AbstractFileManager;
use App\Domain\Core\File\Abstracts\AbstractFileManagerBlade;
use App\Domain\Core\File\Interfaces\BladeActionsInterface;
use App\Domain\Core\File\Interfaces\BladeCreatorInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;


class FileBladeCreatorIndex extends AbstractFileManagerBlade implements BladeActionsInterface
{

    protected function getPath(): string
    {
        return $this->pathMain . self::INDEX;
    }

    protected function getTemplatePath(): string
    {
        return self::FROM_INDEX;
    }

    public function getBladeActions(): string
    {
        try {
            return $this->entity->getBladeActions();
        } catch (\Exception $exception) {

        }
        return "";
    }

    protected function formatFile($file_from): string
    {
        return sprintf($file_from,
            $this->getTitle(),
            $this->getBladeActions(),
            $this->bladeGenerator->generateHtml(),
        );
    }
}
