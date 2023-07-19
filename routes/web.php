<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\QuizController;
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
    return redirect()->to('auth/login');
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

Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'dashboard')->name('user.dashboard');
    });
    Route::prefix('quiz')->group(function() {
        Route::controller(QuizController::class)->group(function () {
            Route::get('', 'quizForm')->name('user.quiz.home');
            Route::post('store', 'store')->name('user.quiz.store');
            Route::get('result', 'result')->name('user.quiz.result');
        });
    });
});

//
