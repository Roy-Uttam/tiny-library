<?php

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
    return view('account');
})->name('accounts');

Route::resource('/book', \App\Http\Controllers\BookController::class);
Route::get('/book/create', '\App\Http\Controllers\BookController@create');
Route::get('book/edit/{id}', '\App\Http\Controllers\BookController@edit');
Route::post('book/update/{id}', '\App\Http\Controllers\BookController@update')->name('update');

Route::resource('/category', \App\Http\Controllers\CategoryController::class);
Route::get('/category/create', '\App\Http\Controllers\CategoryController@create');
Route::get('category/edit/{id}', '\App\Http\Controllers\CategoryController@edit');
Route::post('category/category/{id}', '\App\Http\Controllers\CategoryController@update')->name('c.update');

Route::resource('/users', \App\Http\Controllers\UserController::class);
Route::get('/member', '\App\Http\Controllers\UserController@member');
Route::get('member/edit/{id}', '\App\Http\Controllers\UserController@edit');
Route::post('member/{id}', '\App\Http\Controllers\UserController@update')->name('m.update');
