<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryImageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleDefaultController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;
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

Route::prefix('categories/{category}/images')->name('categories.images.')->group(function () {
    Route::put('', [CategoryImageController::class, 'update'])->name('update');
    Route::delete('', [CategoryImageController::class, 'destroy'])->name('destroy');
});

Route::put('roles/{role}/default', RoleDefaultController::class)->name('roles.update.default');

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);
Route::resource('types', TypeController::class);
Route::resource('sizes', SizeController::class);
