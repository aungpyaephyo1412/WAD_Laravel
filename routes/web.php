<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\categoryController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\pageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [pageController::class, 'home'])->name('page.home');
//Route::prefix('stock')->controller(itemControllerBackup::class)->group(function () {
//    Route::get('/', 'index')->name('stock.index');
//    Route::get('/create', 'create')->name('stock.create');
//    Route::post('/', 'store')->name('stock.store');
//    Route::get('/{id}', 'show')->name('stock.show');
//    Route::delete('/{id}', 'destroy')->name('stock.destroy');
//    Route::get('/{id}/edit', 'edit')->name('stock.edit');
//    Route::put('/{id}', 'update')->name('stock.update');
//});

Route::middleware(\App\Http\Middleware\IsAuthenticated::class)->group(function () {
    Route::resource('stock', ItemController::class);
    Route::resource('category', categoryController::class);
    Route::resource('stock', \App\Http\Controllers\StockController::class);
    Route::prefix('dashboard')->controller(HomeController::class)->group(function () {
        Route::get('home', 'home')->name('dashboard.home');
    });
    Route::middleware(\App\Http\Middleware\IsVerified::class)->prefix('password')->controller(AuthController::class)->group(function () {
        Route::get('change', 'changePassword')->name('auth.passwordChange');
        Route::post('change', 'chaingingPassword')->name('auth.passwordChanging');
    });
    Route::prefix('mail')->controller(AuthController::class)->group(function () {
        Route::get('verify', 'verify')->name('mail.verify');
        Route::post('verify', 'verifying')->name('mail.verifying');
    });
});

//Authentication
Route::controller(AuthController::class)->group(function () {
    Route::middleware(\App\Http\Middleware\IsNotAuthenticated::class)->group(function () {
        Route::get('register', 'register')->name('auth.register');
        Route::post('register', 'store')->name('auth.store');
        Route::get('login', 'login')->name('auth.login');
        Route::post('login', 'check')->name('auth.check');
        Route::prefix('password')->group(function () {
            Route::get('forgot', 'forgot')->name('auth.forgot');
            Route::post('forgot', 'checkEmail')->name('auth.checkEmail');
            Route::get('new', 'newPassword')->name('auth.newPassword');
            Route::post('reset', 'resetPassword')->name('auth.resetPassword');
        });
    });
    Route::post('logout', 'logout')->name('auth.logout');
});

