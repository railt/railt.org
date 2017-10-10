<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);


Route::get('/', 'HomeController@index')
    ->name('home');

Route::get('/{lang}', 'LanguageController@select')
    ->name('language')
    ->where('lang', '\w{2}');

Route::get('/docs/{page?}', 'DocumentationController@show')
    ->name('docs')
    ->where('page', '[a-zA-Z0-9\-\/]+');
