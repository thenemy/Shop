<?php

namespace App\Domain\Core\Api\CardService\Model;

use App\Domain\Core\Api\CardService\Error\CardServiceError;
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

    private function checkBeforeWithdraw()
    {
        if (!$this->payable->check()) {
            throw new CardServiceError(__("Запрещено снимать деньги"));
        }
    }

    public function saveWithdraw()
    {
        try {
            $this->withdraw();
        } catch (CardServiceError $exception) {
            $this->reverse();
            throw $exception;
        }
    }

    public function withdraw($token = null): bool
    {
        $this->checkBeforeWithdraw();
        $token = $this->getToken($token);
        $transaction_id = $this->merchant->create($this->payable->amount(), $this->payable->account_id());
        $this->payable->setTransaction($transaction_id);
        $response = $this->merchant->pre_confirm($token, $this->payable->getTransaction());
        $confirm = $this->merchant->confirm($this->payable->getTransaction());
        return $this->payable->finishTransaction($confirm);
    }

    public function reverse($hold_money = 0)
    {
        if ($this->payable->getTransaction())
            $this->merchant->reverse($this->payable->getTransaction(), $hold_money);
    }
}
