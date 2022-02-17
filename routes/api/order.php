<?php

use  Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Basket\BasketController;

Route::middleware([
    "auth:sanctum",
    "ability:server-full"
])->prefix("/basket")->group(function () {
    Route::get("/", [BasketController::class, "view"]);

});
