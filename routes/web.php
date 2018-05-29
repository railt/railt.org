<?php

use App\Http\Controllers\AuthController;


Route::any('/logout', 'AuthController@logout');

Route::group(['prefix' => 'auth'], function() {
    $providers = \implode('|', AuthController::getProviders());

    Route::get('{provider}', 'AuthController@redirect')
        ->name('auth')
        ->where('provider', $providers);

    Route::any('{provider}/callback', 'AuthController@auth')
        ->name('auth.callback')
        ->where('provider', $providers);
});

Route::pattern('domain', 'ru|en');

Route::group([
    'domain' => '{domain}.' . \config('app.domain'),
    'middleware' => 'prefetch:dist/app.css,dist/app.js'
], function () {
    Route::get('{any?}', 'HomeController@index')
        ->name('home.language')
        ->where('any', '.*?');
});

Route::get('{any?}', 'HomeController@index')
    ->name('home')
    ->where('any', '.*?');
