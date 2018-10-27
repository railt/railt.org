<?php
/**
 * This file is part of serafimarts.ru package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Navigation;

use Illuminate\Routing\Route;
use Illuminate\Routing\Router;
use Illuminate\Container\Container;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Factory;

/**
 * Class NavigationServiceProvider.
 */
class NavigationServiceProvider extends ServiceProvider
{
    /**
     * @var Factory
     */
    private $views;

    /**
     * @param Factory $views
     * @return void
     */
    public function boot(Factory $views): void
    {
        $this->views = $views;

        $this->app->singleton(NavigationMatcher::class, function (Container $app) {
            $route = $this->route($app->make(Router::class));

            return new NavigationMatcher($route);
        });

        $this->compose('*', NavigationViewComposer::class);
    }

    /**
     * @param  Router $router
     * @return Route
     */
    private function route(Router $router): Route
    {
        $route = $router->current();

        if ($route === null) {
            $route = $router->get('/');
        }

        return $route;
    }

    /**
     * @param array|string $views
     * @param string $viewComposer
     */
    private function compose($views, string $viewComposer): void
    {
        $this->app->singleton($viewComposer);
        $this->views->composer($views, $viewComposer);
    }
}
