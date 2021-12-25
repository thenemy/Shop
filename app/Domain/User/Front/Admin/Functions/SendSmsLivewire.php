<?php

namespace App\Domain\User\Front\Admin\Functions;

use App\Domain\Core\Front\Admin\Livewire\Functions\Abstracts\AbstractFunction;
use App\Domain\Core\Front\Admin\Livewire\Functions\Abstracts\AbstractFunctionComponent;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\FunctionStandardTemplate;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Traits\FunctionGenerate;
use App\Http\Livewire\Admin\Base\Abstracts\BaseLivewireDynamic;
use phpDocumentor\Reflection\Types\Self_;

class SendSmsLivewire extends AbstractFunction
{
    const FUNCTION_NAME = "sendSms";

    public static function sendSms(BaseLivewireDynamic $component): string
    {
        $component->validate(
            [
                'entity.card_number' => "required",
                'entity.date_number' => "required"
            ]
        );
        dd($component);
        return BaseLivewireDynamic::class;
    }


}
