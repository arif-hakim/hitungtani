<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KebunController;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\JenisTanamanController;

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::group(['middleware' => 'accessToken'], function(){
    Route::resource('/kebun', KebunController::class);
    Route::post('/anggaran', [AnggaranController::class, 'store']);
    Route::put('/anggaran/{id}', [AnggaranController::class, 'update']);
    Route::delete('/anggaran/{id}', [AnggaranController::class, 'destroy']);
    Route::get('/anggaran/{id}', [AnggaranController::class, 'show']);
    Route::get('/jenis_tanaman', [JenisTanamanController::class, 'index']);
});