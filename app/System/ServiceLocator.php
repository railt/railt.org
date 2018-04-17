<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\System;

use Illuminate\Contracts\Container\Container;

/**
 * Class ServiceLocator
 */
abstract class ServiceLocator
{
    /**
     * @var Container
     */
    private $app;

    /**
     * @var array
     */
    private $services = [];

    /**
     * ServiceLocator constructor.
     * @param Container $app
     */
    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->boot();
    }

    /**
     * @return void
     */
    private function boot(): void
    {
        foreach ($this->services() as $service => $alias) {
            if (\is_int($service)) {
                $service = $alias;
            }

            $this->services[$alias] = $service;
        }
    }

    /**
     * @return iterable
     */
    abstract protected function services(): iterable;

    /**
     * @param string $name
     * @return object|mixed
     * @throws \Exception
     * @throws \InvalidArgumentException
     */
    public function __get(string $name)
    {
        if (! \array_key_exists($name, $this->services)) {
            $error    = 'Service name %s was not registered in locator. Only one of %s are allowed';
            $services = \implode(', ', \array_keys($this->services));

            throw new \InvalidArgumentException(\sprintf($error, $name, $services));
        }

        return $this->app->make($this->services[$name]);
    }
}
