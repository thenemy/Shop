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
        Route::get('/', [\App\Http\Controllers\Admin\CategoryController::class, "index"])->name('admin.category.index');
    }
);

Route::name("admin.")->group(function () {
    Route::resource(
        \App\Domain\Core\Front\Admin\Routes\Admin\AdminRoutesInterface::CATEGORY,
        \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource(
        \App\Domain\Core\Front\Admin\Routes\Admin\AdminRoutesInterface::CATEGORY_OPEN,
        \App\Http\Controllers\Admin\CategoryChildController::class);
});
