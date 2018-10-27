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
    /**
     * @var string
     */
    private const DELIMITER = ':';

    /**
     * @var string
     */
    public const CREATE = 'create';

    /**
     * @var string
     */
    public const UPDATE = 'update';

    /**
     * @var string
     */
    public const DELETE = 'delete';

    /**
     * @var string
     */
    public const READ   = 'read';

    /**
     * @var string[]
     */
    private const CRUD = [
        self::CREATE,
        self::UPDATE,
        self::DELETE,
        self::READ,
    ];

    /**
     * @param string $action
     * @param string $object
     * @return string
     */
    private static function concat(string $action, string $object): string
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
        $class = \str_replace('\\', '_', $entity);
        $class = \mb_strtolower($class);

        return static::concat($action, $class);
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
     * @param string[] $entities
     * @return iterable|string[]
     */
    public static function crud(string ...$entities): array
    {
        $result = [];

        foreach ($entities as $entity) {
            foreach (self::CRUD as $ability) {
                $result[] = static::make($ability, $entity);
            }
        }

        return $result;
    }
}
