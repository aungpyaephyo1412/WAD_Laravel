<?php

use App\Http\Controllers\categoryController;

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

Route::resource('stock', ItemController::class);
Route::resource('category', categoryController::class);
Route::resource('stock',\App\Http\Controllers\StockController::class);

