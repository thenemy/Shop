<?php

namespace App\Domain\Core\Api\CardService\BindCard\Model;

use App\Domain\Core\Api\CardService\Model\AuthPaymoService;
use Illuminate\Support\Facades\Http;

class BindCardService extends AuthPaymoService
{
    const SERVER = parent::SERVER . "partner/bind-card/";
    public string $token;

    public function __construct()
    {
        parent::__construct();
        $this->token = $this->getToken();
    }

    public function create($card_number, $expiry, $language = 'ru')
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->asForm()->post(self::SERVER . 'create', [
            'card_number' => $card_number,
            'expiry' => $expiry,
            'lang' => $language
        ]);
        file_put_contents("test_bind.txt", $response->body());
        $response_decoded = $response->object();
        return $response_decoded->transaction_id;
    }

    public function apply($transaction_id, $otp, $language = "ru")
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->asForm()->post(self::SERVER . 'apply', [
            'transaction_id' => $transaction_id,
            'otp' => $otp,
            'lang' => $language
        ]);
        file_put_contents("test_bind.txt", $response->body());
        $response_decoded = $response->object();
        return $response_decoded;
    }

    public function dial($transaction_id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->asForm()->post(self::SERVER . 'dial', [
            'transaction_id' => $transaction_id,
        ]);
        $response_decoded = $response->object();
        return $response_decoded;
    }

    public function list_cards($page, $page_size)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->asForm()->post(self::SERVER . 'list-cards', [
            'page' => $page,
            'page_size' => $page_size
        ]);
        $response_decoded = $response->object();
        return $response_decoded;
    }
}
