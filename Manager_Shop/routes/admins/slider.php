<?php

use Illuminate\Support\Facades\Route;

Route::prefix('slider') -> group(function(){
    Route::get('/', [
        'as' => 'slider.index',
        'uses' => 'App\Http\Controllers\SliderAdminController@index'
    ]);
    Route::get('/create', [
        'as' => 'slider.create',
        'uses' => 'App\Http\Controllers\SliderAdminController@create'
    ]);
    Route::post('/store', [
        'as' => 'slider.store',
        'uses' => 'App\Http\Controllers\SliderAdminController@store'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'slider.edit',
        'uses' => 'App\Http\Controllers\SliderAdminController@edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'slider.update',
        'uses' => 'App\Http\Controllers\SliderAdminController@update'
    ]);
    Route::get('/destroy/{id}', [
        'as' => 'slider.destroy',
        'uses' => 'App\Http\Controllers\SliderAdminController@destroy'
    ]);
    
    
});