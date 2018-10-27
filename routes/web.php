<?php
/**
 * This file is part of Railt package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', 'HomeController@index')
    ->name('home');

/*
|--------------------------------------------------------------------------
| Documentation
|--------------------------------------------------------------------------
*/

Route::get('/docs', 'DocsController@index')
    ->name('docs');

Route::get('/docs/{page}', 'DocsController@show')
    ->name('docs.page')
    ->where('page', '.+?');

/*
|--------------------------------------------------------------------------
| Blog
|--------------------------------------------------------------------------
*/

Route::get('/blog', 'BlogController@index')
    ->name('blog');



/*
|--------------------------------------------------------------------------
| Community
|--------------------------------------------------------------------------
*/

Route::get('/community', 'CommunityController@index')
    ->name('community');

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::any('/logout', 'AuthController@logout');

Route::group(['prefix' => 'auth'], function() {
    $providers = \implode('|', AuthController::getProviders());

    Route::get('{provider}', 'AuthController@redirect')
        ->name('auth')
        ->where('provider', $providers);

    /*Route::any('{provider}/callback', 'AuthController@auth')
        ->name('auth.callback')
        ->where('provider', $providers);*/
});


/*
|--------------------------------------------------------------------------
| Language
|--------------------------------------------------------------------------
*/

Route::any('/lang/{lang}', 'LanguageController@select')
    ->where('lang', '\w{2}')
    ->name('language');
