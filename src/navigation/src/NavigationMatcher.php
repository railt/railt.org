<?php
/**
 * This file is part of serafimarts.ru package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Navigation;

use Illuminate\Support\Str;
use Illuminate\Routing\Route;

/**
 * Class NavigationMatcher
 */
class NavigationMatcher
{
    /**
     * @var string
     */
    private $active;

    /**
     * @var Route
     */
    private $route;

    /**
     * NavMatcher constructor.
     * @param Route  $route
     * @param string $active
     */
    public function __construct(Route $route, string $active = 'active')
    {
        $this->active = $active;
        $this->route = $route;
    }

    /**
     * @param  string $route
     * @param string|null $class
     * @return string
     */
    public function match(string $route, string $class = null): string
    {
        return $this->is($route) ? ($class ?? $this->active) : '';
    }

    /**
     * @param string $route
     * @return bool
     */
    public function is(string $route): bool
    {
        return $this->isCurrent($route) || $this->isMatched($route);
    }

    /**
     * @param  string $needle
     * @return bool
     */
    private function isCurrent(string $needle): bool
    {
        return $this->route->getName() === $needle;
    }

    /**
     * @param  string $needle
     * @return bool
     */
    private function isMatched(string $needle): bool
    {
        return Str::startsWith($this->route->getName(), $needle . '.');
    }
}
