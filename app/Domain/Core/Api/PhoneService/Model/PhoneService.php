<?php

namespace App\Domain\Core\Api\PhoneService\Model;

use App\Domain\Core\Api\PhoneService\Error\PhoneError;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PhoneService
{
    const SERVER = "notify.eskiz.uz/api/";
    public $authorization = null;

    public function authorize()
    {
        $response = Http::post(self::SERVER . "auth/login", [
            "email" => env("SMS_EMAIL"),
            "password" => env("SMS_PASSWORD")
        ]);
        if ($response->getStatusCode() == 401) {
            throw new PhoneError("Failed To Authorize to Sms channel", 401);
        }
        $response = json_decode($response->body());
        $this->authorization = $response->data->token;
        put_env(["SMS_AUTHORIZATION" => $this->authorization]);
    }

    private function leftOnlyIntegers($phone)
    {
        return preg_filter("/[^0-9]/", "", $phone);
    }

    public function send_code($phone_to_send, string $message)
    {
        $secret = $this->authorization ?? env("SMS_AUTHORIZATION");
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $secret,
        ])->post(self::SERVER . 'message/sms/send', [
            'mobile_phone' => $this->leftOnlyIntegers($phone_to_send),
            'message' => $message,
            'from' => '4546'
        ]);
        if ($response->getStatusCode() == 401) {
            $this->authorize();
            return $this->send_code($phone_to_send, $message);
        }
        $response_decoded = $response->json();
        if ($response->getStatusCode() == 400) {

            throw new PhoneError($response->body(), 400);
        }
        return $response_decoded;
    }
}
