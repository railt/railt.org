<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\User;

use Illuminate\Contracts\Auth\Access\Gate;

/**
 * Trait Authorization
 */
trait Authorization
{
    /**
     * @param string $ability
     * @param array $arguments
     * @return bool
     */
    public function can($ability, $arguments = []): bool
    {
        \assert(\is_string($ability));
        \assert(\is_array($arguments));

        return $this->hasAbility($ability) && $this->gate($ability, $arguments);
    }

    /**
     * @param string $ability
     * @param array $arguments
     * @return bool
     */
    private function gate(string $ability, array $arguments = []): bool
    {
        /** @var Gate $gate */
        $gate = \app(Gate::class);

        \assert($gate instanceof Gate);

        return $gate->forUser($this)->check($ability, $arguments);
    }

    /**
     * @param string $ability
     * @return bool
     */
    public function hasAbility(string $ability): bool
    {
        \assert(\property_exists($this, 'roles'));

        return \in_array($ability, $this->roles, true);
    }
}
