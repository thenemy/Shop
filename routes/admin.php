<?php

use App\Domain\Core\Front\Admin\Routes\Admin\AdminRoutesInterface;
use Illuminate\Support\Facades\Route;


Route::name("admin.")->group(function () {
    Route::get("/admin", function () {
        return "";
    })->name("admin.index");
    Route::resources(
        [
            AdminRoutesInterface::USER => \App\Http\Controllers\Admin\UserController::class,
            AdminRoutesInterface::CATEGORY => \App\Http\Controllers\Admin\CategoryController::class,
            AdminRoutesInterface::CATEGORY_OPEN => \App\Http\Controllers\Admin\CategoryChildController::class,
            AdminRoutesInterface::PRODUCT => \App\Http\Controllers\Admin\ProductController::class,
            AdminRoutesInterface::SHOP => \App\Http\Controllers\Admin\ShopController::class,
            AdminRoutesInterface::MAIN_CREDIT => \App\Http\Controllers\Admin\MainCreditController::class
        ]
    );
});

