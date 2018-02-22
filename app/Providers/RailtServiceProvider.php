<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Providers;

use App\Http\GraphQL\ImportExtension\ImportServiceProvider;
use Illuminate\Cache\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Railt\Foundation\Application;
use Railt\Http\RequestInterface;
use Railt\SDL\Compiler;
use Railt\SDL\Schema\CompilerInterface;
use Railt\Storage\Persister;
use Railt\Storage\Psr16Persister;
use App\Http\GraphQL\Request as GraphQLRequest;

/**
 * Class RailtServiceProvider
 */
class RailtServiceProvider extends ServiceProvider
{
    /**
     * @return void
     * @throws \LogicException
     * @throws \Railt\SDL\Exceptions\CompilerException
     * @throws \OutOfBoundsException
     */
    public function boot(): void
    {
        /**
         * Initialize PSR-16 Cache driver
         */
        $this->app->singleton(Persister::class, function(): Persister {
            return new Psr16Persister($this->app->make(Repository::class));
        });

        /**
         * Initialize compiler
         */
        $this->app->singleton(Compiler::class, function(): CompilerInterface {
            return new Compiler($this->app->make(Persister::class));
        });

        /**
         * Initialize GraphQL Application
         */
        $this->app->singleton(Application::class, function(): Application {
            $compiler = $this->app->make(Compiler::class);
            $debug = (bool)\config('app.debug', false);

            $app = new Application($compiler, $this->app, $debug);
            $app->extend(ImportServiceProvider::class);

            return $app;
        });

        /**
         * Bind GraphQL Request
         */
        $this->app->bind(RequestInterface::class, function(): RequestInterface {
            return new GraphQLRequest($this->app->make(Request::class));
        });
    }
}
