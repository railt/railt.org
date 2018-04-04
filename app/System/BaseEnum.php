<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\System;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

/**
 * Class BaseEnum
 */
abstract class BaseEnum extends Type
{
    /**
     * @var array[]
     */
    private $constants;

    /**
     * @param array $fieldDeclaration
     * @param AbstractPlatform $platform
     * @return string
     * @throws \ReflectionException
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform): string
    {
        $toString = function(string $value): string {
            return \sprintf('\'%s\'', $value);
        };

        $filtered = \array_map($toString, \array_values($this->getEnums()));

        return 'ENUM(' . \implode(', ', $filtered) . ')';
    }

    /**
     * @return array
     * @throws \ReflectionException
     */
    private function getEnums(): array
    {
        if ($this->constants === null) {
            $this->constants = [];
            $reflection = new \ReflectionClass(static::class);

            foreach ($reflection->getConstants() as $name => $value) {
                if (\defined('self::' . $name)) {
                    continue;
                }

                $this->constants[$name] = $value;
            }
        }

        return $this->constants;
    }

    /**
     * @param string $value
     * @param AbstractPlatform $platform
     * @return mixed|null
     * @throws \ReflectionException
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if (\in_array($value, $this->getEnums(), true)) {
            return $value;
        }

        return null;
    }

    /**
     * @param mixed $value
     * @param AbstractPlatform $platform
     * @return mixed
     * @throws \OutOfBoundsException
     * @throws \ReflectionException
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        if (\in_array($value, $this->getEnums(), true)) {
            return $value;
        }

        $error = 'Invalid enum value of %s class';
        throw new \OutOfBoundsException(\sprintf($error, static::class));
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return static::class;
    }

    /**
     * @param AbstractPlatform $platform
     * @return bool
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }
}
