<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ValidateCheckController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/register',[RegisterController::class, 'create'])
    ->middleware('guest')
    ->name('register');
Route::post('/register',[RegisterController::class, 'store'])
    ->middleware('guest');
Route::get('/login',[LoginController::class, 'index'])
    ->middleware('guest')
    ->name('login');
Route::post('/login',[LoginController::class, 'authenticate'])
    ->middleware('guest');
Route::get('/logout',[LoginController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

Route::get('/show',[UserController::class, 'index'])->name('user.index');
Route::post('/upload', [UploadController::class,'store']);
Route::post('/validate/index', [ValidateCheckController::class,'index']);
