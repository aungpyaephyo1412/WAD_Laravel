<?php

use App\Http\Controllers\itemController;
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

Route::get('/',[pageController::class,'home'])->name('page.home');
Route::get('inventory',[itemController::class,'index'])->name('inventory.index');
Route::get('inventory/create',[itemController::class,'create'])->name('inventory.create');
Route::post('inventory',[itemController::class,'store'])->name('inventory.store');

