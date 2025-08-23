<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\GoogleAuthController;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\SocialAuthController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




Route::post('register', [AuthController::class,'register']);
Route::post('login', [AuthController::class,'login']);

// Authenticated routes
Route::middleware('auth:sanctum')->group(function(){
    Route::post('logout', [AuthController::class,'logout']);
    Route::apiResource('posts', PostController::class);
});

Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);
