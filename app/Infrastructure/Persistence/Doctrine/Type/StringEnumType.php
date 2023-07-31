<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Type;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

/**
 * @internal This is an internal application class, please do use it in
 *           App\Infrastructure\Persistence\Doctrine\Types namespace only.
 * @psalm-internal App\Infrastructure\Persistence\Doctrine\Types
 */
abstract class StringEnumType extends Type
{
    /**
     * @return non-empty-string
     */
    public function getName(): string
    {
        return static::getEnumClass();
    }

    /**
     * @phpstan-return class-string<\BackedEnum>
     * @psalm-return class-string<\BackedEnum>
     * @return class-string<\StringBackedEnum>
     */
    abstract protected static function getEnumClass(): string;

    /**
     * {@inheritDoc}
     *
     * @psalm-suppress UnnecessaryVarAnnotation
     */
    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        /**
         * @psalm-var class-string<\BackedEnum> $class
         * @phpstan-var class-string<\BackedEnum> $class
         * @var class-string<\StringBackedEnum> $class
         */
        $class = static::getEnumClass();

        $type = \strtolower(\str_replace('\\', '_', $class));
        $comment = $this->getSQLCreateTypeDeclaration($type, $class);

        return \sprintf('%s /* %s */', $type, $comment);
    }

    /**
     * @param non-empty-string $name
     * @phpstan-param class-string<\BackedEnum> $class
     * @psalm-param class-string<\BackedEnum> $class
     * @param class-string<\StringBackedEnum> $class
     *
     * @return non-empty-string
     */
    private function getSQLCreateTypeDeclaration(string $name, string $class): string
    {
        $cases = [];

        foreach ($class::cases() as $case) {
            $cases[] = \sprintf("'%s'", $case->value);
        }

        /** @psalm-suppress LessSpecificReturnStatement */
        return \sprintf(<<<'SQL'
            CREATE TYPE %s AS ENUM(
                %s
            )
            SQL, $name, \implode(", \n", $cases));
    }

    /**
     * @param \BackedEnum|null $value
     * @phpstan-ignore-next-line phpstan covariant suppression
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): string|null
    {
        if ($value === null) {
            return null;
        }

        /** @phpstan-var non-empty-string */
        return $value->value;
    }

    /**
     * @param non-empty-string|null $value
     * @phpstan-ignore-next-line phpstan covariant suppression
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): ?\BackedEnum
    {
        if ($value === null) {
            return null;
        }

        $class = static::getEnumClass();

        return $class::tryFrom($value);
    }
}
