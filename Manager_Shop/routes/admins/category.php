<?php

use Illuminate\Support\Facades\Route;

Route::prefix('categories')->group(function () {
    Route::get('/', [
        'as' => 'categories.index',
        'uses' => 'App\Http\Controllers\CategoryController@index',
        'middleware' => 'can:category_list'
    ]);
    Route::get('/create', [
        'as' => 'categories.create',
        'uses' => 'App\Http\Controllers\CategoryController@create',
        'middleware' => 'can:category_add'
    ]);
    Route::post('/store', [
        'as' => 'categories.store',
        'uses' => 'App\Http\Controllers\CategoryController@store'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'categories.edit',
        'uses' => 'App\Http\Controllers\CategoryController@edit',
        'middleware' => 'can:category_edit,id'
    ]);
    Route::post('/update/{id}', [
        'as' => 'categories.update',
        'uses' => 'App\Http\Controllers\CategoryController@update'
    ]);
    Route::get('/destroy/{id}', [
        'as' => 'categories.destroy',
        'uses' => 'App\Http\Controllers\CategoryController@destroy',
        'middleware' => 'can:category_delete'
    ]);
});
