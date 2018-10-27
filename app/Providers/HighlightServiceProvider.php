<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Providers;

use Highlight\Highlighter;
use Illuminate\Support\ServiceProvider;

/**
 * Class HighlightServiceProvider
 */
class HighlightServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(Highlighter::class, function() {
            $hl = new Highlighter();

            $hl::registerLanguage('php', \resource_path('highlight/php.json'));
            $hl::registerLanguage('graphql', \resource_path('highlight/graphql.json'));
            $hl::registerLanguage('sdl', \resource_path('highlight/graphql.json'));
            $hl::registerLanguage('json', \resource_path('highlight/json.json'));
            $hl::registerLanguage('accord', \resource_path('highlight/accord.json'));

            return $hl;
        });
    }
}
