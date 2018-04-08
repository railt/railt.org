<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Providers;

use App\Views\Composers\AuthTokenComposer;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider;

/**
 * Class ViewComposersServiceProvider
 */
class ViewComposersServiceProvider extends ServiceProvider
{
    private const COMPOSERS = [
        AuthTokenComposer::class => ['*']
    ];

    /**
     * @param Factory $views
     */
    public function boot(Factory $views): void
    {
        foreach (self::COMPOSERS as $composer => $names) {
            $this->app->singleton($composer);

            $views->composer($names, $composer);
        }
    }
}
