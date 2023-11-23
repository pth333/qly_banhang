<?php
use Illuminate\Support\Facades\Route;

Route::prefix('permission') -> group(function(){
    Route::get('/create', [
        'as' => 'permission.create',
        'uses' => 'App\Http\Controllers\PermissionAdminController@createPermission'
    ]);
    Route::post('/store', [
        'as' => 'permission.store',
        'uses' => 'App\Http\Controllers\PermissionAdminController@store'
    ]);
});