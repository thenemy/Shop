<?php

namespace App\Http\Controllers\Api\Authorization;

use App\Http\Controllers\Api\Base\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends ApiController
{
    public function login(Request $request)
    {
        $request->validate([
            "phone" => "required",
            "password" => "required"
        ]);
        if (Auth::attempt([
            'phone' => $request->phone,
            "password" => $request->password
        ])) {
            $user = Auth::user();
            return $this->result([
                'token' => $user->login()
            ]);
        }
        return $this->errors(__("Wrong Credentials"), 403);
    }

    public function logout()
    {
//        auth()->user()->logout();
    }

}
