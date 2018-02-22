<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @var string $domain
 * @var \App\Providers\RouteServiceProvider $this
 */
declare(strict_types=1);

Route::pattern('lang', '\w{2}');

Route::domain('{lang}.' . $domain)->group(function () {
    Route::get('docs/{path?}', 'DocsController@show')
        ->where('path', '[\w\-/]+')
        ->name('docs');

    Route::get('/', 'HomeController@show')->name('home');
});

Route::domain($domain)->group(function () {
    Route::get('/{path?}', 'HomeController@index')
        ->where('path', '.*?');
});
