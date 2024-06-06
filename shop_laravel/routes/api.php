<?php

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

Route::post('/orders', \App\Http\Controllers\API\Order\StoreController::class);

Route::get('/products', \App\Http\Controllers\API\Product\IndexController::class);
Route::get('/products/{product}', \App\Http\Controllers\API\Product\ShowController::class);

Route::get('/categories', [\App\Http\Controllers\API\Report\ApiController::class, 'getCategoriesWithProducts']);
Route::get('/report/purchases', [\App\Http\Controllers\API\Report\ApiController::class, 'generatePurchaseReport']);
Route::get('/sort', [\App\Http\Controllers\API\Report\ApiController::class, 'sortProducts'])->name('api.sort');
Route::put('/products/{product}/move', [\App\Http\Controllers\API\Report\ApiController::class, 'moveProduct'])->name('api.moveProduct');
