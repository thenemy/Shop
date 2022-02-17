<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\CommentAndMark\ProductCommentMarkController;
use App\Http\Controllers\Api\Product\ProductController;
use App\Http\Controllers\Api\Product\CommentController;

Route::prefix("/product/{product}")->middleware([
    "auth:sanctum",
    "ability:server-full"
])->group(function () {
    Route::get("/", [ProductController::class, "view"]);
    Route::get("/rate/", [ProductController::class, "rate"]);
    Route::post("/comment/", [ProductCommentMarkController::class, "leftComment"]);
    Route::get("/comment/", [CommentController::class, "comments"]);
    Route::post("/comment/like/", [CommentController::class, "like"]);
    Route::post("/comment/dislike/", [CommentController::class, "disLike"]);
});
