<?php

namespace App\Domain\Core\Front\Admin\Form\Attributes\Models;

use App\Domain\Core\Front\Admin\Form\Attributes\Base\BaseInputFileTemp;
use App\Domain\File\Entities\FileManyTemp;

class InputFileTempManyAttribute extends BaseInputFileTemp
{
    public function __construct($keyToAttach, $label)
    {
        parent::__construct(FileManyTemp::class, $keyToAttach, $label, true);
    }
}
