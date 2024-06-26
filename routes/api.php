<?php

use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    // Authentication: Logout
    Route::post('logout', [Controllers\API\AuthController::class, 'logout']);

    // Comment
    Route::apiResource('comment', Controllers\API\CommentController::class);

    // Like
    Route::post('like/{comment}', [Controllers\API\LikeController::class, 'store']);
    Route::patch('like/{like}', [Controllers\API\LikeController::class, 'update']);
});

Route::post('session', [Controllers\API\AuthController::class, 'login'])->name('login');
