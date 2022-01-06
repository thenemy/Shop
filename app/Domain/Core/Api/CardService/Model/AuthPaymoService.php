<?php

namespace App\Domain\Core\Api\CardService\Model;

use App\Domain\Core\Api\CardService\BindCard\Error\BindCardError;
use App\Domain\Core\Api\CardService\Error\CardServiceError;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AuthPaymoService
{
    const SERVER = "api.paymo.uz/";
    public $access_token = null;
    public $base64 = null;
    const TEST = "TEST_";
    const PROD = "PRODUCTION_";
    const EXECUTE = self::TEST;

    public function __construct()
    {
        if (!($this->base64 = env(self::EXECUTE . "BASE64_PAYMO"))) {
            $this->base64 = base64_encode(env(self::EXECUTE . "CONSUMER_KEY") . ":" . env(self::EXECUTE . "CONSUMER_SECRET"));
            put_env([self::EXECUTE . "BASE64" => $this->base64]);
        }
    }

    public function storeToken($res)
    {
        Log::info("RESPONSE " . $res);
        $response = json_decode($res->body());

        $this->access_token = $response->access_token;
        put_env([self::EXECUTE . "CARD_ACCESS_TOKEN" => $this->access_token]);
        return $this->access_token;
    }

    public function getAccessToken()
    {
        return $this->access_token ?? env(self::EXECUTE . "CARD_ACCESS_TOKEN");
    }

    public function getToken()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $this->base64,
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(self::SERVER . 'token', [
            'grant_type' => 'client_credentials'
        ]);
        dd($response->body());
        $resp_encoded = json_decode($response->body());
        file_put_contents("test.txt", $response->body());
        if ($response->getStatusCode() == 401 || $response->getStatusCode() == 400) {
            throw new CardServiceError($resp_encoded->error_description, 401);
        }
        return $this->storeToken($response);
    }

    public function refreshToken()
    {
        $token = $this->getAccessToken();
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $this->base64,
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(self::SERVER . 'token', [
            'grant_type' => 'client_credentials',
            'refresh_token' => $token
        ]);
        $resp_encoded = json_decode($response->body());
        if ($response->getStatusCode() == 401) {
            throw new CardServiceError($resp_encoded->error_description, 401);
        }
        return $this->storeToken($response);
    }

    public function revokeToken()
    {
        $token = $this->getAccessToken();
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $this->base64,
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(self::SERVER . 'revoke', [
            'token' => $token
        ]);
        $resp_encoded = json_decode($response->body());
        if ($response->getStatusCode() == 401) {
            throw new CardServiceError($resp_encoded->error_description, 401);
        }
    }
}
