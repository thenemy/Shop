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
            AdminRoutesInterface::SUB_CATEGORY => \App\Http\Controllers\Admin\SubCategoryController::class,
            AdminRoutesInterface::CATEGORY_ALL => \App\Http\Controllers\Admin\AllCategoryController::class,
            AdminRoutesInterface::PRODUCT => \App\Http\Controllers\Admin\ProductController::class,
            AdminRoutesInterface::SHOP => \App\Http\Controllers\Admin\ShopController::class,
            AdminRoutesInterface::MAIN_CREDIT => \App\Http\Controllers\Admin\MainCreditController::class,
            AdminRoutesInterface::TAKEN_CREDIT => \App\Http\Controllers\Admin\TakenCreditController::class,
            AdminRoutesInterface::SURETY => \App\Http\Controllers\Admin\SuretyController::class,
            AdminRoutesInterface::BANNER => \App\Http\Controllers\Admin\BannerController::class,
            AdminRoutesInterface::BRAND => \App\Http\Controllers\Admin\BrandController::class,
            AdminRoutesInterface::COLOR => \App\Http\Controllers\Admin\ColorController::class,
            AdminRoutesInterface::DASHBOARD => \App\Http\Controllers\Admin\DashboardController::class
        ]
    );
});

