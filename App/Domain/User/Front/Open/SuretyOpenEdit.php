<?php

namespace App\Domain\User\Front\Open;

use App\Domain\Core\Front\Admin\File\Attributes\FileAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileTempAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\User\Entities\Surety;
use App\Domain\User\Front\Dynamic\SuretyPlasticCardDynamic;
use App\Domain\User\Front\Traits\SuretyGenerationAttributes;
use App\Domain\User\Interfaces\SuretyRelationInterface;
use App\Domain\User\Interfaces\UserRelationInterface;

class SuretyOpenEdit extends Surety implements CreateAttributesInterface
{
    use SuretyGenerationAttributes;

    public function generateAttributes(): BladeGenerator
    {
        return BladeGenerator::generation([
            self::generationSuretyEdit()
        ]);
    }

    public function getPassportReverseEditAttribute()
    {
        return $this->getPassportReverseEdit();
    }

    public function getPassportUserEditAttribute(): FileAttribute
    {
        return $this->getPassportUserEdit();
    }

    public function getPassportEditAttribute(): FileAttribute
    {
        return $this->getPassportEdit();
    }
}
