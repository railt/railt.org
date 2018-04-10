<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\User;
use App\System\BaseEnum;

/**
 * Interface Ability
 */
final class Ability extends BaseEnum
{
    public const DELIMITER = ':';

    public const CREATE = 'create';
    public const UPDATE = 'update';
    public const DELETE = 'delete';
    public const READ   = 'read';

    /**
     * @param string $action
     * @param string $object
     * @return string
     */
    public static function concat(string $action, string $object): string
    {
        return $action . self::DELIMITER . $object;
    }

    /**
     * @param string $action
     * @param string $entity
     * @return string
     */
    public static function make(string $action, string $entity): string
    {
        return static::concat($action, \class_basename($entity));
    }

    /**
     * @param string $entity
     * @return string
     */
    public static function create(string $entity): string
    {
        return static::make(static::CREATE, $entity);
    }

    /**
     * @param string $entity
     * @return string
     */
    public static function update(string $entity): string
    {
        return static::make(static::UPDATE, $entity);
    }

    /**
     * @param string $entity
     * @return string
     */
    public static function read(string $entity): string
    {
        return static::make(static::READ, $entity);
    }

    /**
     * @param string $entity
     * @return string
     */
    public static function delete(string $entity): string
    {
        return static::make(static::DELETE, $entity);
    }

    /**
     * @return iterable|string[]
     */
    public static function abilities(): iterable
    {
        yield static::READ;
        yield static::CREATE;
        yield static::UPDATE;
        yield static::DELETE;
    }

    /**
     * @param string $entity
     * @return iterable|string[]
     */
    public static function crud(string $entity): iterable
    {
        foreach (static::abilities() as $ability) {
            yield static::make($ability, $entity);
        }
    }
}
