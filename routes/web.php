<?php

use Illuminate\Support\Facades\Route;
$url = "App\Http\Controllers";

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
// tambah data
Route::get('product/tambah', $url. '\productController@tambah');
Route::post('product/simpan', $url. '\productController@simpan');

//edit data
Route::get('product/edit/{product:product_slug}', $url. '\productController@edit');
Route::post('product/update', $url. '\productController@update');
Route::patch('product/update', $url. '\productController@update');

//hapus data
Route::delete('product/delete/{product:product_slug}', $url. '\productController@delete');


//tampilan
Route::get('product/{slug}', $url. '\productController@showProduct');
Route::middleware(['auth:sanctum', 'verified'])->get('product', $url. '\productController@index');

//export
Route::get('product/export/xlsx', $url. '\productController@exportXL');

//import
Route::get('upload', $url. '\productController@upload');
Route::post('product/upload/data', $url. '\productController@uploadData');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
