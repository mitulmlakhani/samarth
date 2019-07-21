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
Route::prefix('admin')->group(function(){
    Route::namespace('Admin')->middleware(['guest:admin'])->group(function() {
        // Authentication Routes...
        Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
        Route::post('login', 'Auth\LoginController@login')->name('admin.login.submit');

        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('admin.password.update');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
    });

    Route::middleware('auth:admin')->group(function() {
        Route::namespace('Admin')->group(function() {
            Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
            Route::get('/', function () {
                return view('admin.home');
            });

            Route::prefix('albums')->group(function() {
                Route::get('', 'AlbumController@index')->name('admin.albums');
            });
            
            Route::prefix('studio')->group(function() {
                Route::get('/', 'StudioController@index')->name('admin.studios');
                Route::get('create', 'StudioController@create')->name('admin.studio.create');
                Route::post('store', 'StudioController@store')->name('admin.studio.store');
                Route::get('edit/{user}', 'StudioController@edit')->name('admin.studio.edit');
                Route::put('update/{user}', 'StudioController@update')->name('admin.studio.update');
                Route::get('delete/{user}', 'StudioController@delete')->name('admin.studio.delete');
            });
        });
    });
});

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('studio')->group(function() {
    Auth::routes();
    Route::get('studio/api/getstudio/{code}', 'Api\AlbumController@get');
    Route::namespace('Studio')->group(function() {
        Route::middleware('auth:web')->group(function() {
            Route::get('/', 'HomeController@index')->name('home');
            Route::get('album', 'AlbumController@index')->name('studio.albums');
        });
    });
});