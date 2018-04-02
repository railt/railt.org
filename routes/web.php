<?php

Route::group(['middleware' => 'prefetch:dist/app.css,dist/app.js'], function () {
    Route::get('{any}', 'HomeController@index')
        ->where('any', '.*?');
});
