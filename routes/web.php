<?php

use App\Http\Controllers\AuthController;

Route::group(['prefix' => 'auth'], function() {
    $providers = \implode('|', AuthController::getProviders());

    Route::get('{provider}', 'AuthController@redirect')
        ->name('auth')
        ->where('provider', $providers);

    Route::any('{provider}/callback', 'AuthController@auth')
        ->name('auth.callback')
        ->where('provider', $providers);
});



Route::group(['middleware' => 'prefetch:dist/app.css,dist/app.js'], function () {
    Route::get('{any?}', 'HomeController@index')
        ->name('home')
        ->where('any', '.*?');
});
