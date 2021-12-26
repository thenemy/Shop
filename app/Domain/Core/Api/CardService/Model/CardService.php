<?php

namespace App\Domain\Core\Api\CardService\Model;

use App\Domain\Core\Api\CardService\BindCard\Error\BindCardError;
use App\Domain\Core\Api\CardService\Error\CardServiceError;
use Illuminate\Support\Facades\Http;

class CardService
{
    const SERVER = "api.paymo.uz/";
    public $access_token = null;
    public $base64= null;

    public function init(){
        $this->base64 = base64_encode(env("CONSUMER_KEY") . ":" . env("CONSUMER_SECRET"));
        put_env(["BASE64" => $this->base64]);
        return $this->base64 ?? env("BASE64");
    }

    public function storeToken($res){
        $response = json_decode($res->body());
        $this->access_token = $response->access_token;
        put_env(["CARD_ACCESS_TOKEN" => $this->access_token]);
        return $this->access_token ?? env("CARD_ACCESS_TOKEN");
    }

    public function getAttribute(){
        return $this->access_token ?? env("CARD_ACCESS_TOKEN");
    }

    public function getToken(){
        $secret = $this->init();
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $secret,
            'Content-Type' => 'application/x-www-form-urlencoded'
        ])->post(self::SERVER . 'token', [
            'grant_type' => 'client_credentials'
        ]);
        $resp_encoded = json_decode($response->body());
        if ($response->getStatusCode() == 401 || $response->getStatusCode() == 400) {
            throw new CardServiceError($resp_encoded->error_description, 401);
        }
        return $this->storeToken($response);
    }

    public function refreshToken(){
        $secret = $this->init();
        $token = $this->access_token ?? env("CARD_ACCESS_TOKEN");
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $secret,
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

    public function revokeToken(){
        $secret = $this->init();
        $token = $this->access_token ?? env("CARD_ACCESS_TOKEN");
        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $secret,
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
