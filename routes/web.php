<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('auth')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('login', 'loginForm');
        Route::post('login', 'login');
        Route::post('logout', 'logout');
    });
    Route::controller(RegisterController::class)->group(function () {
        Route::get('register', 'registerForm');
        Route::post('register', 'register');
    });
});

//
