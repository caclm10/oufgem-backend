<?php

use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryImageController;
use App\Http\Controllers\EWalletAccountController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductSizeController;
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

Route::prefix('products')->name('products.')->group(function () {

    Route::prefix('{product}')->group(function () {
        Route::prefix('sizes')->name('sizes.')->controller(ProductSizeController::class)->group(function () {
            Route::post('', 'store')->name('store');
            Route::put('{size}', 'update')->name('update');
            Route::delete('{size}', 'destroy')->name('destroy');
        });

        Route::prefix('images')->name('images.')->controller(ProductImageController::class)->group(function () {
            Route::post('', 'store')->name('store');
        });
    });

    Route::prefix('images')->name('images.')->controller(ProductImageController::class)->group(function () {
        Route::get('{productImage}', 'show')->name('show');
        Route::delete('{productImage}', 'destroy')->name('destroy');
    });
});

Route::put('roles/{role}/default', RoleDefaultController::class)->name('roles.update.default');

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('categories', CategoryController::class);
Route::resource('types', TypeController::class);
Route::resource('sizes', SizeController::class);
Route::resource('products', ProductController::class);
Route::resource('payment-methods', PaymentMethodController::class);
Route::resource('e-wallet-accounts', EWalletAccountController::class);
Route::resource('bank-accounts', BankAccountController::class);
