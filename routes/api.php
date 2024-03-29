<?php

use App\Http\Controllers\Admin\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

include "api/user.php";
include "api/home.php";
include "api/category.php";
include "api/action.php";
include "api/product.php";

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/sms/send_code', [UserController::class, 'send_code']);

Route::get("/banner", [\App\Http\Controllers\Api\Main\BrandController::class, "index"]);
