<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\GraphQL\Extensions\Auth;

use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Contracts\Auth\Guard;
use Railt\Foundation\Events\ActionDispatching;
use Railt\Foundation\Events\TypeBuilding;
use Railt\Foundation\Extensions\BaseExtension;
use Railt\Io\File;
use Railt\Reflection\Contracts\Dependent\FieldDefinition;
use Railt\SDL\Schema\CompilerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;

/**
 * Class Extension
 */
class Extension extends BaseExtension
{
    private const SCHEMA_FILE = __DIR__ . '/auth.graphqls';

    /**
     * @param CompilerInterface $compiler
     * @param EventDispatcherInterface $events
     * @throws \Symfony\Component\Finder\Exception\AccessDeniedException
     * @throws \Railt\Io\Exceptions\NotReadableException
     */
    public function boot(CompilerInterface $compiler, EventDispatcherInterface $events): void
    {
        $compiler->compile(File::fromPathname(self::SCHEMA_FILE));

        $events->addListener(ActionDispatching::class, function(ActionDispatching $event) {
            $field = $event->getInput()->getFieldDefinition();

            if ($field instanceof FieldDefinition && ! $this->allowed($field)) {
                throw new AccessDeniedException('Permission denied');
            }
        });
    }

    /**
     * @param FieldDefinition $field
     * @return bool
     */
    private function allowed(FieldDefinition $field): bool
    {
        return $this->auth($field) && $this->guest($field) && $this->gate($field);
    }

    /**
     * @param FieldDefinition $field
     * @return bool
     */
    private function auth(FieldDefinition $field): bool
    {
        if ($field->hasDirective('auth')) {
            return $this->isAuthenticatable();
        }

        return true;
    }

    /**
     * @return bool
     */
    private function isAuthenticatable(): bool
    {
        return $this->make(Guard::class)->check();
    }

    /**
     * @param FieldDefinition $field
     * @return bool
     */
    private function guest(FieldDefinition $field): bool
    {
        if ($field->hasDirective('guest')) {
            return ! $this->isAuthenticatable();
        }

        return true;
    }

    /**
     * @param FieldDefinition $field
     * @return bool
     */
    private function gate(FieldDefinition $field): bool
    {
        if ($field->hasDirective('can')) {
            if (! $this->isAuthenticatable()) {
                return false;
            }

            foreach ($field->getDirectives('can') as $gate) {
                if (! $this->hasAbility($gate->getPassedArgument('ability'), $field)) {
                    return false;
                }
            }
        }

        return true;
    }

    /**
     * @param string $ability
     * @param FieldDefinition $field
     * @return bool
     */
    private function hasAbility(string $ability, FieldDefinition $field): bool
    {
        return $this->make(Authorizable::class)->can($ability, [$field]);
    }
}
