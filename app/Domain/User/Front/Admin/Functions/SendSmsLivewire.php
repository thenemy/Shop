<?php

namespace App\Domain\User\Front\Admin\Functions;

use App\Domain\Core\Api\CardService\BindCard\Error\BindCardError;
use App\Domain\Core\Api\CardService\BindCard\Model\BindCardService;
use App\Domain\Core\Api\CardService\Error\CardServiceError;
use App\Domain\Core\Front\Admin\Livewire\Functions\Abstracts\AbstractFunction;
use App\Domain\Core\Front\Admin\Livewire\Functions\Abstracts\AbstractFunctionComponent;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\FunctionStandardTemplate;
use App\Domain\Core\Front\Admin\Livewire\Functions\Interfaces\LivewireAdditionalFunctions;
use App\Domain\Core\Front\Admin\Livewire\Functions\Traits\FunctionGenerate;
use App\Http\Livewire\Admin\Base\Abstracts\BaseLivewireDynamic;
use Illuminate\Validation\ValidationException;
use phpDocumentor\Reflection\Types\Self_;

class SendSmsLivewire extends AbstractFunction
{
    const FUNCTION_NAME = "sendSms";

    public static function sendSms(BaseLivewireDynamic $component): string
    {
        $component->validate(
            [
                'entity.card_number' => "required|min:19",
                'entity.date_number' => "required|min:5|max:5"
            ]
        );
        $service = new BindCardService();
        try {
            $component->entity['transaction_id'] = $service->create(
                $component->entity['card_number'],
                $component->entity['date_number'],
            );
            session()->flash("success", __("Вам отправлен SMS код"));
        } catch (BindCardError $exception) {
            $plastic_data = json_decode($exception->getMessage(), true);
            $component->entity['plastic_data'] = $plastic_data;
            session()->flash("success", $plastic_data['result']['description']);
        } catch (CardServiceError $exception) {
            $component->addError("bind", $exception->getMessage());
        }

        return "";
    }


}
