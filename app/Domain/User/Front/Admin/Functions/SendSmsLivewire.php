<?php

namespace App\Domain\User\Front\Admin\Functions;

use App\Domain\Core\Front\Admin\Livewire\Functions\Abstracts\AbstractFunction;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\FunctionStandardTemplate;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Traits\FunctionGenerate;
use App\Http\Livewire\Admin\Base\Abstracts\BaseLivewireDynamic;
use phpDocumentor\Reflection\Types\Self_;

class SendSmsLivewire implements LivewireAdditionalFunctions, FunctionStandardTemplate
{
    const FUNCTION_NAME = "sendSms";

    public function generateFunctions(): string
    {
        return sprintf(self::FUNCTION_BODY,
            self::FUNCTION_NAME,
            "",
            '\\' . self::class . '::' . 'getSms($this);'
        );
    }

    public static function getSms(BaseLivewireDynamic $component)
    {
        $component->validate(
            [
                'entity.card_number' => "required",
                'entity.date_number' => "required"
            ]
        );
        dd($component->entity);
    }
}
