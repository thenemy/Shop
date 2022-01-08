<?php

namespace App\Domain\Core\Api\CardService\Merchant\Model;

use App\Domain\Core\Api\CardService\Model\AuthPaymoService;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Merchant extends AuthPaymoService
{
    const SERVER = parent::SERVER . "merchant/pay/";
    const STORE_ID = self::EXECUTE . "STORE_ID";
    private string $token;
    private string $store_id;

    public function __construct()
    {
        parent::__construct();
        $this->token = $this->getToken();
        $this->store_id = env(self::STORE_ID);
    }

    protected function checkOnError($object, Response $response)
    {
        dd($object);
    }

    public function create($amount, $account, $terminal_id = null, $details = null)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->post(self::SERVER . 'create', [
            'amount' => $amount,
            'account' => $account,
            'store_id' => $this->store_id,
            'terminal_id' => $terminal_id,
            'details' => $details
        ]);
        $object = $response->json();
        $this->checkOnError($object, $response);
        return $object['transaction_id'];
    }

    public function pre_confirm($card_token, $transaction_id, $card_number = null, $expiry = null)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->post(self::SERVER . 'pre-confirm', [
            'card_token' => $card_token,
            'card_number' => $card_number,
            'expiry' => $expiry,
            'store_id' => $this->store_id,
            'transaction_id' => $transaction_id
        ]);
        return $response->json();
    }

    public function confirm($transaction_id, $otp = null)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->post(self::SERVER . 'confirm', [
            'transaction_id' => $transaction_id,
            'otp' => $otp,
            'store_id' => $this->store_id
        ]);
        return $response->json();
    }

    public function otp_resend($transaction_id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->post(self::SERVER . 'otp-resend', [
            'transaction_id' => $transaction_id,
        ]);
        return $response->json();
    }

    public function reverse($transaction_id, $hold_amount = 0, $reason = "")
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->post(self::SERVER . 'reverse', [
            'transaction_id' => $transaction_id,
            'reason' => $reason,
            'hold_amount' => $hold_amount
        ]);
        return $response->json();
    }

    public function get($transaction_id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->post(self::SERVER . 'get', [
            'store_id' => $this->store_id,
            'transaction_id' => $transaction_id
        ]);
        return $response->json();
    }
}
