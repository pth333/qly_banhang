<?php

use Illuminate\Support\Facades\Route;

Route::prefix('users') -> group(function(){
    Route::get('/', [
        'as' => 'users.index',
        'uses' => 'App\Http\Controllers\AdminUserController@index'
    ]);
    Route::get('/create', [
        'as' => 'users.create',
        'uses' => 'App\Http\Controllers\AdminUserController@create'
    ]);
    Route::post('/store', [
        'as' => 'users.store',
        'uses' => 'App\Http\Controllers\AdminUserController@store'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'users.edit',
        'uses' => 'App\Http\Controllers\AdminUserController@edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'users.update',
        'uses' => 'App\Http\Controllers\AdminUserController@update'
    ]);
    Route::get('/destroy/{id}', [
        'as' => 'users.destroy',
        'uses' => 'App\Http\Controllers\AdminUserController@destroy'
    ]);
});