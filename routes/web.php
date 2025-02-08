<?php

use App\Http\Controllers\productControlleur;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/articles', 'articleControlleur@index');
Route::get('/products', [productControlleur::class, 'index2']);
route::resource('product',productControlleur::class);
Route::get('/', function () {
    return redirect()->route('products.index2');
});

