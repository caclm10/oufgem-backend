<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryImageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoleDefaultController;
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


// Route::prefix('roles')->name('roles.')->group(function () {
//     Route::prefix('{role}')->group(function () {

//     });
// });
Route::put('roles/{role}/default', RoleDefaultController::class)->name('roles.update.default');
Route::put('categories/{category}/image', CategoryImageController::class)->name('categories.update.image');

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);
