<?php

use Illuminate\Support\Facades\Route;

Route::prefix('roles') -> group(function(){
    Route::get('/', [
        'as' => 'roles.index',
        'uses' => 'App\Http\Controllers\AdminRoleController@index'
    ]);
    Route::get('/create', [
        'as' => 'roles.create',
        'uses' => 'App\Http\Controllers\AdminRoleController@create'
    ]);
    Route::post('/store', [
        'as' => 'roles.store',
        'uses' => 'App\Http\Controllers\AdminRoleController@store'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'roles.edit',
        'uses' => 'App\Http\Controllers\AdminRoleController@edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'roles.update',
        'uses' => 'App\Http\Controllers\AdminRoleController@update'
    ]);
    Route::get('/destroy/{id}', [
        'as' => 'roles.destroy',
        'uses' => 'App\Http\Controllers\AdminRoleController@destroy'
    ]);
});