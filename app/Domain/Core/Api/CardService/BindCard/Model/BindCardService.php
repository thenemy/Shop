<?php

namespace App\Domain\Core\Api\CardService\BindCard\Model;

use Illuminate\Support\Facades\Http;

class BindCardService
{
    const SERVER = "api.paymo.uz/partner/bind-card/";

    public function create($card_number, $expiry, $language){
        $secret = env("CARD_ACCESS_TOKEN");
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $secret,
        ])->post(self::SERVER . 'create', [
            'card_number' => $card_number,
            'expiry' => $expiry,
            'lang' => $language
        ]);
        $response_decoded = json_decode($response->body());
        return $response_decoded->transaction_id;
    }

    public function apply($transaction_id, $otp, $language){
        $secret = env("CARD_ACCESS_TOKEN");
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $secret,
        ])->post(self::SERVER . 'apply', [
            'transaction_id' => $transaction_id,
            'otp' => $otp,
            'lang' => $language
        ]);
        $response_decoded = json_decode($response->body());
        return $response_decoded;
    }

    public function dial($transaction_id){
        $secret = env("CARD_ACCESS_TOKEN");
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $secret,
        ])->post(self::SERVER . 'dial', [
            'transaction_id' => $transaction_id,
        ]);
        $response_decoded = json_decode($response->body());
        return $response_decoded;
    }

    public function list_cards($page, $page_size){
        $secret = env("CARD_ACCESS_TOKEN");
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $secret,
        ])->post(self::SERVER . 'list-cards', [
            'page' => $page,
            'page_size' => $page_size
        ]);
        $response_decoded = json_decode($response->body());
        return $response_decoded;
    }
}
