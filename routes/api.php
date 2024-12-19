<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserDataController;
use Illuminate\Support\Facades\Route;

// تسجيل المستخدم وتسجيل الدخول
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

// حماية باقي المسارات بوسيط التحقق من المستخدم
Route::middleware('auth:api')->group(function () {
    Route::get('user', [UserController::class, 'getUser']);
    Route::put('user/{id}', [UserController::class, 'updateUser']);

    // إدارة بيانات المستخدم
    Route::get('user/{id}/data', [UserDataController::class, 'getUserData']);
    Route::post('user/{id}/data', [UserDataController::class, 'addUserData']);
    Route::put('user/{id}/data', [UserDataController::class, 'updateUserData']);
});
