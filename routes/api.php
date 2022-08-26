<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\v1\CollectionController;
use App\Http\Controllers\API\V1\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('products', ProductController::class);
Route::apiResource('categories', CategoryController::class);
// Route::apiResource('collections', CollectionController::class);

Route::get('/collections/{slug?}', [CollectionController::class, 'index']);
