<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('tests/test','TestController@index');

Route::get('shops/index','ShopController@index');



Route::group(['prefix' => 'memo','middleware' => 'auth'],function(){
    Route::get('index','MemosController@index')->name('memo.index');
    Route::get('create','MemosController@create')->name('memo.create');
    Route::post('store','MemosController@store')->name('memo.store');
    Route::get('show/{id}','MemosController@show')->name('memo.show');
    Route::get('edit/{id}','MemosController@edit')->name('memo.edit');
    Route::post('update/{id}','MemosController@update')->name('memo.update');
    Route::post('destroy/{id}','MemosController@destroy')->name('memo.destroy');
});

// Route::resource('memos', 'MemosController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
