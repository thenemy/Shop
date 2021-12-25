<?php

namespace App\Domain\Installment\Front\Admin\Functions;

use App\Domain\Core\Front\Admin\Livewire\Functions\Abstracts\AbstractFunction;
use App\Http\Livewire\Admin\Base\Abstracts\BaseLivewireDynamic;

class SmsNotPayment extends AbstractFunction
{
    const FUNCTION_NAME = "sendNotPaid";

    static public function sendNotPaid(BaseLivewireDynamic $component)
    {

    }
}
