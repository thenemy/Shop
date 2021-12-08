<?php

namespace App\Domain\Core\Front\Admin\Form\Attributes\Models;

use App\Domain\Core\Front\Admin\Form\Attributes\Base\BaseInputFileTemp;
use App\Domain\File\Entities\FileTemp;

class InputFileTempAttribute extends BaseInputFileTemp
{
    public function __construct($keyToAttach, $label)
    {
        parent::__construct(FileTemp::class, $keyToAttach, $label, false);
    }
}
