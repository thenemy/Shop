<?php

namespace App\Domain\Core\Api\CardService\Merchant\Model;

use App\Domain\Core\Api\CardService\Model\CardService;
use Illuminate\Support\Facades\Http;

class Merchant
{
    const SERVER = "api.paymo.uz/merchant/pay/";
    public CardService $ser;

    public function __construct($ser)
    {
        $this->ser = $ser;
        $this->storeID = env("STORE_ID");
    }

    public function create($amount, $account, $store_id, $terminal_id = null, $details = null)
    {
        $secret = $this->ser->getAttribute();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $secret,
        ])->post(self::SERVER . 'create', [
            'amount' => $amount,
            'account' => $account,
            'store_id' => $store_id,
            'terminal_id' => $terminal_id,
            'details' => $details
        ]);
        $response_decoded = json_decode($response->body());
        return $response_decoded;
    }

    public function pre_confirm($card_token, $card_number, $expiry, $store_id, $transaction_id)
    {
        $secret = $this->ser->getAttribute();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $secret,
        ])->post(self::SERVER . 'pre-confirm', [
            'card_token' => $card_token,
            'card_number' => $card_number,
            'expiry' => $expiry,
            'store_id' => $store_id,
            'transaction_id' => $transaction_id
        ]);
    }

    public function confirm($transaction_id, $otp, $store_id)
    {
        $secret = $this->ser->getAttribute();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $secret,
        ])->post(self::SERVER . 'confirm', [
            'transaction_id' => $transaction_id,
            'otp' => $otp,
            'store_id' => $store_id
        ]);
    }

    public function otp_resend($transaction_id)
    {
        $secret = $this->ser->getAttribute();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $secret,
        ])->post(self::SERVER . 'otp-resend', [
            'transaction_id' => $transaction_id,
        ]);
    }

    public function reverse($transaction_id, $reason, $hold_amount)
    {
        $secret = $this->ser->getAttribute();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $secret,
        ])->post(self::SERVER . 'reverse', [
            'transaction_id' => $transaction_id,
            'reason' => $reason,
            'hold_amount' => $hold_amount
        ]);
    }

    public function get($store_id, $transaction_id)
    {
        $secret = $this->ser->getAttribute();
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $secret,
        ])->post(self::SERVER . 'get', [
            'store_id' => $store_id,
            'transaction_id' => $transaction_id
        ]);
    }
}
