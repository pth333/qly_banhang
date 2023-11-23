<?php

use Illuminate\Support\Facades\Route;

Route::prefix('menus') -> group(function(){
    Route::get('/', [
        'as' => 'menus.index',
        'uses' => 'App\Http\Controllers\MenuController@index',
        'middleware' => 'can:menu_list'
    ]);
    Route::get('/create', [
        'as' => 'menus.create',
        'uses' => 'App\Http\Controllers\MenuController@create',
        'middleware' => 'can:menu_add'
    ]);
    Route::post('/store', [
        'as' => 'menus.store',
        'uses' => 'App\Http\Controllers\MenuController@store',
        
    ]);
    Route::get('/edit/{id}', [
        'as' => 'menus.edit',
        'uses' => 'App\Http\Controllers\MenuController@edit',
        'middleware' => 'can:menu_edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'menus.update',
        'uses' => 'App\Http\Controllers\MenuController@update',
        
    ]);
    Route::delete('/destroy/{id}', [
        'as' => 'menus.destroy',
        'uses' => 'App\Http\Controllers\MenuController@destroy',
        'middleware' => 'can:menu_delete'
    ]);
  
});