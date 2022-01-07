<?php

namespace App\Domain\Core\Api\CardService\BindCard\Model;

use App\Domain\Core\Api\CardService\BindCard\Error\BindCardError;
use App\Domain\Core\Api\CardService\Model\AuthPaymoService;
use Illuminate\Http\Client\Response;
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

    private function transformDate($date): string
    {
        $divide = explode("/", $date);
        if (count($divide) == 2) {
            return $divide[1] . $divide[0];
        }
        throw new BindCardError(__("Не правильный формат даты"), BindCardError::ERROR_OCCURED);
    }

    public function create($card_number, $expiry, $language = 'ru')
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->post(self::SERVER . 'create', [
            'card_number' => str_replace(" ", '', $card_number),
            'expiry' => $this->transformDate($expiry),
            'lang' => $language
        ]);
        $object = $response->json();
        $this->checkOnError($object, $response);
        return $object['transaction_id'];
    }

    private function checkOnError($object, Response $response)
    {
        if ($object['result'] && $object['result']['code'] != "OK") {
            if ($object['result']['code'] == "STPIMS-ERR-133") {
                throw new BindCardError($response->body(), BindCardError::ALREADY_EXISTS);
            }
            throw new BindCardError($object['result']['description'], BindCardError::ERROR_OCCURED);
        }
    }
    // :"STPIMS-ERR-133
    // :STPIMS-ERR-004
    public function apply($transaction_id, $otp, $language = "ru")
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->post(self::SERVER . 'apply', [
            'transaction_id' => $transaction_id,
            'otp' => $otp,
            'lang' => $language
        ]);
        $object = $response->json();
        $this->checkOnError($object, $response);
        return $object;
    }

    public function dial($transaction_id)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->asForm()->post(self::SERVER . 'dial', [
            'transaction_id' => $transaction_id,
        ]);
        $response_decoded = $response->json();
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
        $response_decoded = $response->json();
        return $response_decoded;
    }
}
