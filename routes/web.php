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
Route::get('inventory/{id}',[itemController::class,'show'])->name('inventory.show');
Route::delete('inventory/{id}',[itemController::class,'destroy'])->name('inventory.destroy');
Route::get('inventory/{id}/edit',[itemController::class,'edit'])->name('inventory.edit');
Route::put('inventory/{id}',[itemController::class,'update'])->name('inventory.update');
Route::resource('category',\App\Http\Controllers\categoryController::class);

