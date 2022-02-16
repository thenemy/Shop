<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\Authorization;

Route::middleware([
    "auth:sanctum",
])->group(function () {

    Route::middleware("ability:server-full")->group(function () {
        Route::post("/changePassword/",
            [Authorization\PasswordController::class, "changePassword"]);
        Route::get("/logout/",
            [Authorization\AuthController::class, "logout"]);
        Route::post("/phoneCodeVerify/",
            [Authorization\VerifyCodeController::class, "phoneCodeVerify"]);
    });
    Route::middleware([
        "ability:server-password"
    ])->group(function () {
        Route::post("/forgetPassword/",
            [Authorization\PasswordController::class, "forgetPassword"]);
    });

    Route::middleware([
        "ability:server-password,server-full"
    ])->group(function () {
        Route::get("/sendCode/",
            [Authorization\VerifyCodeController::class, "sendCode"]);
        Route::post("/verifyCode/",
            [Authorization\VerifyCodeController::class, "verifyCode"]);
    });

});


Route::post("/issueTokenForPassword/",
    [Authorization\PasswordController::class, "issuePasswordToken"]);


// without middleware
Route::post("/login/",
    [Authorization\AuthController::class, "login"]);
Route::post("/register/",
    [Authorization\RegisterController::class, "register"]);

