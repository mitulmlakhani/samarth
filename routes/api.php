<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Admin\Api')->group(function(){
    Route::post('login', 'AuthController@login');
    
    Route::middleware('auth:api')->group(function(){
        
        Route::prefix('studio')->group(function(){
            Route::get('list', 'StudioController@list');
        });

        Route::prefix('album')->group(function(){
            Route::post('create', 'AlbumController@create');
        });

    });
});

Route::namespace('Studio\Api')->prefix('studio')->group(function() {
    Route::post('login', 'AuthController@login');
    Route::middleware(['auth:studio_api', 'studio_validity'])->group(function(){
        Route::post('album/create', 'AlbumController@create');
    });
});
