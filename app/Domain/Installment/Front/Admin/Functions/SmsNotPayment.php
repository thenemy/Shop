<?php

namespace App\Domain\Installment\Front\Admin\Functions;

use App\Domain\Core\Api\PhoneService\Model\PhoneService;
use App\Domain\Core\Front\Admin\Livewire\Functions\Abstracts\AbstractFunction;
use App\Domain\Installment\Entities\TakenCredit;
use App\Http\Livewire\Admin\Base\Abstracts\BaseLivewire;
use Livewire\Component;

class SmsNotPayment extends AbstractFunction
{
    const FUNCTION_NAME = "sendNotPaid";

    static public function sendNotPaid(BaseLivewire $component)
    {
//        $phoneService = new PhoneService();
//        $taken = TakenCredit::find($component->filterBy['taken_credit_id']);
//        $phoneService->send_code($taken->user->phone, );
    }
}
