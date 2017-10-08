<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Providers;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider;

/**
 * Class ViewServiceProvider
 */
class ViewServiceProvider extends ServiceProvider
{
    /**
     * @throws \InvalidArgumentException
     */
    public function boot(): void
    {
        /** @var Factory $factory */
        $factory = $this->app->make(Factory::class);

        $configs = $this->app->make(Repository::class);

        foreach ((array)$configs->get('view.composers') as $cls => $views) {
            $this->app->singleton($cls);

            $factory->composer($views, $cls);
        }
    }
}
