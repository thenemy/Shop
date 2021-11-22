<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    "prefix" => LaravelLocalization::setLocale(),
    "middleware" => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
],
    function () {

    }
);

Route::name("admin.")->group(function () {
    Route::resource(
        'category',
        \App\Http\Controllers\Admin\CategoryController::class);
});

Route::get('/adminasd', function () {
    return view('admin');
});
