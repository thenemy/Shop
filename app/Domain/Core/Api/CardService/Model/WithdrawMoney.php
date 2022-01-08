<?php

namespace App\Domain\Core\Api\CardService\Model;

use App\Domain\Core\Api\CardService\Interfaces\Payable;
use App\Domain\Core\Api\CardService\Merchant\Model\Merchant;

class WithdrawMoney
{
    private Merchant $merchant;
    private Payable $payable;

    public function __construct(Payable $payable)
    {
        $this->merchant = new Merchant();
        $this->payable = $payable;
    }

    public function withdraw($token = null): bool
    {
        $token = $token ?? $this->payable->getTokens()->first();
        $transaction_id = $this->merchant->create($this->payable->amount(), $this->payable->account_id());
        $this->payable->setTransaction($transaction_id);
        $this->merchant->pre_confirm($token, $this->payable->getTransaction());
        $confirm = $this->merchant->confirm($this->payable->getTransaction());
        return $this->payable->finishTransaction($confirm);
    }

    public function reverse()
    {
        $this->merchant->reverse($this->payable->getTransaction());
    }
}
