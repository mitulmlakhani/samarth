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
                return view('admin.home')->with(['total_studios' => \App\Models\User::count(), 'total_ambums' => \App\Models\Album::count()]);
            });

            Route::get('password/change', 'ProfileController@showChangePassword')->name('admin.password.change');
            Route::post('password/change', 'ProfileController@changePassword')->name('admin.password.save');

            Route::prefix('albums')->group(function() {
                Route::get('', 'AlbumController@index')->name('admin.albums');
                Route::get('delete/{album}', 'AlbumController@delete')->name('admin.album.delete');
            });
            
            Route::prefix('studio')->group(function() {
                Route::get('/', 'StudioController@index')->name('admin.studios');
                Route::get('create', 'StudioController@create')->name('admin.studio.create');
                Route::post('store', 'StudioController@store')->name('admin.studio.store');
                Route::get('edit/{user}', 'StudioController@edit')->name('admin.studio.edit');
                Route::put('update/{user}', 'StudioController@update')->name('admin.studio.update');
                Route::get('delete/{user}', 'StudioController@delete')->name('admin.studio.delete');
                Route::get('panel/{id}', function($id) {
                    $user = App\Models\User::find($id);
                    \Auth::guard('web')->login($user);
                    return redirect()->route('home');
                })->name('admin.studio.login');
            });
        });
    });
});

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('studio')->group(function() {
    Auth::routes();
    Route::get('api/getstudio/{code}', 'Api\AlbumController@get');
    Route::namespace('Studio')->group(function() {

        Route::middleware('auth:web')->group(function() {
            Route::get('/', 'HomeController@index')->name('home');
            // Profile
            Route::get('profile', 'ProfileController@index')->name('studio.profile');
            Route::post('profile', 'ProfileController@save')->name('studio.profile.save');
            // Change Password
            Route::get('password/change', 'ProfileController@showChangePassword')->name('studio.password.change');
            Route::post('password/change', 'ProfileController@changePassword')->name('studio.password.save');
            // Profile
            Route::get('social', 'ProfileController@socialLinks')->name('studio.social');
            Route::post('social/change', 'ProfileController@saveSocialLinks')->name('studio.social.save');

            // Album
            Route::get('album', 'AlbumController@index')->name('studio.albums');
            // Portfolio
            Route::prefix('portfolio')->group(function() {
                Route::get('/', 'PortfolioController@index')->name('studio.portfolios');
                Route::get('create', 'PortfolioController@create')->name('studio.portfolio.create');
                Route::post('store', 'PortfolioController@store')->name('studio.portfolio.store');
                Route::get('{portfolio}/delete', 'PortfolioController@delete')->name('studio.portfolio.delete');
            });

            // Services
            Route::prefix('service')->group(function() {
                Route::get('/', 'ServicesController@index')->name('studio.services');
                Route::get('create', 'ServicesController@create')->name('studio.service.create');
                Route::post('store', 'ServicesController@store')->name('studio.service.store');
                Route::get('{service}/delete', 'ServicesController@delete')->name('studio.service.delete');
            });
            
            // Team
            Route::prefix('team')->group(function() {
                Route::get('/', 'TeamController@index')->name('studio.team');
                Route::get('create', 'TeamController@create')->name('studio.team.create');
                Route::post('store', 'TeamController@store')->name('studio.team.store');
                Route::get('{team}/delete', 'TeamController@delete')->name('studio.team.delete');
            });
            
            // Team
            Route::prefix('banner')->group(function() {
                Route::get('/', 'BannerController@index')->name('studio.banners');
                Route::get('create', 'BannerController@create')->name('studio.banner.create');
                Route::post('store', 'BannerController@store')->name('studio.banner.store');
                Route::get('{banner}/delete', 'BannerController@delete')->name('studio.banner.delete');
            });

        });

    });
});

Route::get('{website_username}', function($website_username) {
    $user = App\Models\User::where('website_username', $website_username)->with('banners', 'services', 'teams', 'portfolios')->first();
    if($user) {
        return view('themes.'.$user->theme.'.index')->with('user', $user);
    }
    abort(404);
});