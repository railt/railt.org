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
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

/**
 * Class RouteServiceProvider
 */
class RouteServiceProvider extends ServiceProvider
{
    private const WEB_NAMESPACE = 'App\Http\Controllers';
    private const API_NAMESPACE = 'App\Http\Controllers\Api';

    /**
     * @var string
     */
    private $domain;

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @param Router $router
     * @param Repository $config
     * @return void
     */
    public function map(Router $router, Repository $config): void
    {
        $this->domain = $this->getDomain($config);

        $this->mapApiRoutes($router, self::API_NAMESPACE);
        $this->mapWebRoutes($router, self::WEB_NAMESPACE);
    }

    /**
     * @param Repository $config
     * @return string
     */
    private function getDomain(Repository $config): string
    {
        return \pathinfo($config->get('app.url'), \PATHINFO_BASENAME);
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @param Router $router
     * @param string $namespace
     * @return void
     */
    protected function mapWebRoutes(Router $router, string $namespace): void
    {
        $router->middleware('web')
            ->namespace($namespace)
            ->group(function() use ($router) {
                $domain = $this->domain;
                require_once base_path('routes/web.php');
            });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @param Router $router
     * @param string $namespace
     * @return void
     */
    protected function mapApiRoutes(Router $router, string $namespace)
    {
        $router->prefix('api')
            ->middleware('api')
            ->namespace($namespace)
            ->group(function() {
                $domain = $this->domain;
                require_once base_path('routes/api.php');
            });
    }
}
