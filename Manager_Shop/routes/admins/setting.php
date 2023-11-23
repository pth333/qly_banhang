<?php

use Illuminate\Support\Facades\Route;

Route::prefix('settings') -> group(function(){
    Route::get('/', [
        'as' => 'settings.index',
        'uses' => 'App\Http\Controllers\AdminSettingController@index'
    ]);
    Route::get('/create', [
        'as' => 'settings.create',
        'uses' => 'App\Http\Controllers\AdminSettingController@create'
    ]);
    Route::post('/store', [
        'as' => 'settings.store',
        'uses' => 'App\Http\Controllers\AdminSettingController@store'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'settings.edit',
        'uses' => 'App\Http\Controllers\AdminSettingController@edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'settings.update',
        'uses' => 'App\Http\Controllers\AdminSettingController@update'
    ]);
    Route::get('/destroy/{id}', [
        'as' => 'settings.destroy',
        'uses' => 'App\Http\Controllers\AdminSettingController@destroy'
    ]);
    
});