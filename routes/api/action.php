<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Action\BasketController;
use App\Http\Controllers\Api\Action\FavouriteController;

//added new
Route::middleware([
    "auth:sanctum",
    "ability:server-full"
])->prefix("action/")->group(function () {
    Route::post("basket/{product}/", [BasketController::class, "basket"]);
    Route::put("basket/{order}/", [BasketController::class, "updateOrder"]);
    Route::delete("basket/{order}/", [BasketController::class, "destroyOrder"]);
    Route::post("basket/destroy/orders/", [BasketController::class, "massDestroyOrder"]);
    Route::post("favourite/{product}/", [FavouriteController::class, "favourite"]);
    Route::delete("favourite/{product}/", [FavouriteController::class, "detach"]);
});
