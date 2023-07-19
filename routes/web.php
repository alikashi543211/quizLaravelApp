<?php

use App\Http\Controllers\Admin\QuestionnaireController;
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

// Authentication
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

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
    });
    Route::prefix('questionnaire')->name('questionnaire.')->group(function() {
        Route::controller(QuestionnaireController::class)->group(function () {
            Route::get('add', 'add')->name('add');
            Route::get('edit/{id}', 'edit')->name('edit');
            Route::get('detail/{id}', 'detail')->name('detail');
            Route::post('delete/{id}', 'delete')->name('delete');
            Route::get('listing', 'listing')->name('listing');
            Route::post('store', 'store')->name('store');
            Route::post('update', 'update')->name('update');

        });
    });

    Route::prefix('report')->name('report.')->group(function() {
        Route::controller(QuestionnaireController::class)->group(function () {
            Route::get('listing', 'listing')->name('listing');
            Route::get('result/{id}', 'result')->name('result');
        });
    });
});

// User Routes
Route::prefix('user')->name('user.')->middleware(['auth'])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
    });
    Route::prefix('quiz')->name('quiz.')->group(function() {
        Route::controller(QuizController::class)->group(function () {
            Route::get('', 'quizForm')->name('home');
            Route::post('store', 'store')->name('store');
            Route::get('result', 'result')->name('result');
        });
    });
});

//
