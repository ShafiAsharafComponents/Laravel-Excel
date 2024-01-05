<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::get('/', [ProductController::class, 'index'])->name('index');
Route::resource('products', ProductController::class);
Route::post('excelUpdate', [ProductController::class, 'excelUpdate'])->name('products.excelUpdate');
Route::post('excelImport', [ProductController::class, 'excelImport'])->name('products.excelImport');
