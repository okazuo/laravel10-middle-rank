<?php

use App\Http\Controllers\ActionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ValidateCheckController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlePayloadAction;

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

Route::middleware('auth')->group(function () {
    Route::get('/show',[UserController::class, 'index'])->name('user.index');
    Route::post('/upload', [UploadController::class,'store']);
    Route::post('/validate/index', [ValidateCheckController::class,'index']);
    Route::get('/action/text',[ActionController::class, 'text']);
    Route::get('/action/view',[ActionController::class, 'view']);
    Route::get('/action/json',[ActionController::class, 'json']);
    Route::get('/action/jsonp',[ActionController::class, 'jsonp']);
    Route::get('/action/download',[ActionController::class, 'download']);
    Route::get('/action/redirect',[ActionController::class, 'redirect']);
    Route::get('/action/sse',[ActionController::class, 'sse']);
    Route::get('/payload',[ArticlePayloadAction::class, '__invoke']);
});
