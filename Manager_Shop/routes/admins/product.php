<?php
use Illuminate\Support\Facades\Route;

Route::prefix('products') -> group(function(){
    Route::get('/', [
        'as' => 'products.index',
        'uses' => 'App\Http\Controllers\AdminProductController@index',
        'middleware' => 'can:product_list'
    ]);
    Route::get('/create', [
        'as' => 'products.create',
        'uses' => 'App\Http\Controllers\AdminProductController@create',
        'middleware' => 'can:product_add'
    ]);
    Route::post('/store', [
        'as' => 'products.store',
        'uses' => 'App\Http\Controllers\AdminProductController@store'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'products.edit',
        'uses' => 'App\Http\Controllers\AdminProductController@edit',
        'middleware' => 'can:product_edit,id'
    ]);
    Route::post('/update/{id}', [
        'as' => 'products.update',
        'uses' => 'App\Http\Controllers\AdminProductController@update'
    ]);
    Route::get('/destroy/{id}', [
        'as' => 'products.destroy',
        'uses' => 'App\Http\Controllers\AdminProductController@destroy',
        'middleware' => 'can:product_delete'
    ]);
});