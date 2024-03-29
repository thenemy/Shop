<?php

namespace App\Domain\Core\Api\CardService\Model;

use App\Domain\Core\Api\CardService\BindCard\Error\BindCardError;
use App\Domain\Core\Api\CardService\Error\CardServiceError;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class AuthPaymoService
{
    const SERVER = "https://api.paymo.uz/";
    private $access_token = null;
    private $base64 = null;
    const TEST = "TEST_";
    const PROD = "PRODUCTION_";
    const EXECUTE = self::TEST;
    const ACCESS_TOKEN = self::EXECUTE . "CARD_ACCESS_TOKEN";

    public function __construct()
    {
        $this->base64 = base64_encode(env(self::EXECUTE . "CONSUMER_KEY") . ":" . env(self::EXECUTE . "CONSUMER_SECRET"));
    }

    final    protected function checkErrorCondition($object): bool
    {
        return $object['result'] && $object['result']['code'] != "OK";
    }

    protected function checkOnError($object)
    {
        if ($this->checkErrorCondition($object)) {
            throw new CardServiceError($object['result']['description'], CardServiceError::ERROR_OCCURRED);
        }
    }
    // :"STPIMS-ERR-133
    // :STPIMS-ERR-004

    public function storeToken($res)
    {
        $response = $res->object();
        $this->access_token = $response->access_token;
        put_env([self::ACCESS_TOKEN => $this->access_token]);
        return $this->access_token;
    }

    public function getAccessToken()
    {
        return $this->access_token ?? env(self::ACCESS_TOKEN);
    }

    private function buildTokenBody(): array
    {
        $body = [
            'grant_type' => 'client_credentials'
        ];
        if ($token = $this->getAccessToken()) {
            $body['refresh_token'] = $token;
        }
        return $body;
    }

    public function getToken()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $this->base64,
        ])->asForm()->post(self::SERVER . 'token', $this->buildTokenBody());
        $resp_encoded = json_decode($response->body());
        if ($response->getStatusCode() == 401 || $response->getStatusCode() == 400) {
            throw new CardServiceError($resp_encoded->error_description, 401);
        }
        return $this->storeToken($response);
    }


    public function revokeToken()
    {
        $token = $this->getAccessToken();
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $this->base64,
        ])->asForm()->post(self::SERVER . 'revoke', [
            'token' => $token
        ]);
        $resp_encoded = json_decode($response->body());
        if ($response->getStatusCode() == 401) {
            throw new CardServiceError($resp_encoded->error_description, 401);
        }
        put_env([self::ACCESS_TOKEN => ""]);
    }
}
