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

            $hl::registerLanguage('php', \resource_path('languages/php.json'));
            $hl::registerLanguage('graphql', \resource_path('languages/graphql.json'));

            return $hl;
        });
    }
}
