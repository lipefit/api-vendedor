<?php

use App\Http\Controllers\SaleController;
use App\Http\Controllers\SellerController;
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

Route::get('sellers/getAll', [SellerController::class, 'getAll']);
Route::post('sellers', [SellerController::class, 'store']);
Route::post('sales', [SaleController::class, 'store']);
Route::get('sales/{id}', [SaleController::class, 'get']);

Route::get('/', function () {
    return view('welcome');
});
