<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\vendor\ProductController;

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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/add_product', [AuthController::class, 'add_product']);
Route::get('/view_product', [AuthController::class, 'view_product']);



Route::post('/vendor/product_add_update/{product?}', [ProductController::class, 'product_add_update']);
