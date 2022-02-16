<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\Category\CategoryViewController;

Route::get("/category/{parent}/{category}/", [CategoryViewController::class, "view"]);
Route::get("/category/{parent}/", []);
Route::get("/category/{parent}/{category}/brand/", [CategoryViewController::class, "brand"]);
