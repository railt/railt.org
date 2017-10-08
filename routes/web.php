<?php

Route::get('/', 'HomeController@index')
    ->name('home');

Route::get('/{lang}', 'LanguageController@select')
    ->name('language')
    ->where('lang', '\w{2}');

Route::get('/docs/{page?}', 'DocumentationController@show')
    ->name('docs')
    ->where('page', '[a-zA-Z0-9\-\/]+');
