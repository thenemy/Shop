<?php

namespace App\Domain\Installment\Front\Admin\Functions;

use App\Domain\Core\Api\PhoneService\Error\PhoneError;
use App\Domain\Core\Api\PhoneService\Model\PhoneService;
use App\Domain\Core\Front\Admin\Livewire\Functions\Abstracts\AbstractFunction;
use App\Domain\Installment\Entities\TakenCredit;
use App\Domain\SchemaSms\Entities\SchemaSmsInstallment;
use App\Domain\SchemaSms\Interfaces\SchemaSmsType;
use App\Http\Livewire\Admin\Base\Abstracts\BaseLivewire;

class SmsNotPayment extends AbstractFunction
{
    const FUNCTION_NAME = "sendNotPaid";

    static public function sendNotPaid(BaseLivewire $component)
    {
        $taken = TakenCredit::find($component->filterBy['taken_credit_id']);
        $sms = SchemaSmsInstallment::remainder()->first();
        $name = str_replace($sms->getConcreteTypeValue(SchemaSmsType::TYPE_NAME), $taken->userData->name, $sms->schema);
        $order = str_replace($sms->getConcreteTypeValue(SchemaSmsType::TYPE_NUMBER_ORDER), $taken->purchase_id, $name);
        try {
            $phoneService = new PhoneService();
            $phoneService->send_code($taken->user->phone, $order);
            session()->flash("success", __("Сообщение успешно отправлено"));
        } catch (PhoneError $exception) {
            $component->addError("phone",
                __("Произошла ошибки при отправке сообщения")
                . " " . $exception->getMessage());
        }

    }
}
