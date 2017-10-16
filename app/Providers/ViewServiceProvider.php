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
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;

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
        /** @var Factory|\Illuminate\View\Factory $factory */
        $factory = $this->app->make(Factory::class);

        /** @var Repository $configs */
        $configs = $this->app->make(Repository::class);

        $this->bootViewComposers($configs, $factory);
        $this->bootViewDirectives($configs, $factory->getEngineResolver()->resolve('blade'));
    }

    /**
     * @param Repository $configs
     * @param Factory $factory
     * @return void
     */
    private function bootViewComposers(Repository $configs, Factory $factory): void
    {
        foreach ((array)$configs->get('view.composers') as $cls => $views) {
            $this->app->singleton($cls);

            $factory->composer($views, $cls);
        }
    }

    /**
     * @param Repository $configs
     * @param CompilerEngine $engine
     * @return void
     */
    private function bootViewDirectives(Repository $configs, CompilerEngine $engine): void
    {
        /** @var BladeCompiler $compiler */
        $compiler = $engine->getCompiler();

        foreach ((array)$configs->get('view.directives') as $cls => $directive) {
            $this->app->singleton($cls);

            $compiler->directive($directive, $this->app->make($cls));
        }
    }
}
