<?php

namespace App\Domain\Core\Api\CardService\Model;

use App\Domain\Core\Api\CardService\Interfaces\Payable;
use App\Domain\Core\Api\CardService\Merchant\Model\Merchant;
use Illuminate\Support\Facades\Log;

class WithdrawMoney
{
    private Merchant $merchant;
    private Payable $payable;

    public function __construct(Payable $payable)
    {
        $this->merchant = new Merchant();
        $this->payable = $payable;
    }

    public function getPayable()
    {
        return $this->payable;
    }

    public function getToken($token = null)
    {
        return $token ?? $this->payable->getTokens()->first();
    }

    public function withdraw($token = null): bool
    {
        $token = $this->getToken($token);
        Log::debug("INFO ABOUT TOKEN ", [$token]);
        $transaction_id = $this->merchant->create($this->payable->amount(), $this->payable->account_id());
        Log::debug("TRANSATCION ID ", [$transaction_id, "money" => $this->payable->amount()]);
        $this->payable->setTransaction($transaction_id);
        $response = $this->merchant->pre_confirm($token, $this->payable->getTransaction());
        Log::debug("RESPONSE PRE CONFIRM GOTTED", $response);
        $confirm = $this->merchant->confirm($this->payable->getTransaction());
        Log::debug("GOT confirm", $confirm);
        return $this->payable->finishTransaction($confirm);
    }

    public function reverse()
    {
        if ($this->payable->getTransaction())
            $this->merchant->reverse($this->payable->getTransaction());
    }
}
