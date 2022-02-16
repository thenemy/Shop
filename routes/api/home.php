<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Api\Main\MainController;
use App\Http\Controllers\Api\Main\ShopController;
use App\Http\Controllers\Api\Main\BrandController;

Route::get("/home/", [MainController::class, "main"]);
Route::get("/home/category/", [MainController::class, "category"]);
Route::get("/home/hitProduct/", [MainController::class, "hitProduct"]);
Route::get("/home/products/", [MainController::class, "products"]);
Route::get("/home/shop/", [ShopController::class, "shop"]);
Route::get("/home/brand/", [BrandController::class, "brand"]);
