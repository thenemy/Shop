<?php

namespace App\Domain\User\Front\Open;

use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableFilterByInterface;
use App\Domain\Core\Front\Admin\CustomTable\Interfaces\TableInFront;
use App\Domain\Core\Front\Admin\CustomTable\Traits\TableFilterBy;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputAttribute;
use App\Domain\Core\Front\Admin\Form\Attributes\Models\InputFileTempAttribute;
use App\Domain\Core\Front\Admin\Form\Interfaces\CreateAttributesInterface;
use App\Domain\Core\Front\Admin\Livewire\Functions\Base\AllLivewireOptionalDropDown;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\OpenButton\Interfaces\OpenEntity;
use App\Domain\Core\Front\Admin\Templates\Models\BladeGenerator;
use App\Domain\Core\Main\Traits\ArrayHandle;
use App\Domain\User\Entities\Surety;
use App\Domain\User\Front\Traits\SuretyGenerationAttributes;
use App\Domain\User\Interfaces\SuretyRelationInterface;
use App\Domain\User\Interfaces\UserRelationInterface;

class SuretyOpenCreate extends Surety implements CreateAttributesInterface
{
    use SuretyGenerationAttributes;

    public function generateAttributes(): BladeGenerator
    {
        return self::generationSuretyCreate();
    }
}
