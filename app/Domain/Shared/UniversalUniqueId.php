<?php

declare(strict_types=1);

namespace App\Domain\Shared;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

abstract readonly class UniversalUniqueId implements IdInterface
{
    /**
     * @var non-empty-string
     */
    private string $value;

    /**
     * @param non-empty-string|\Stringable $value
     */
    final public function __construct(string|\Stringable $value)
    {
        $this->value = (string)$value;
    }

    public static function new(): static
    {
        return new static(Uuid::uuid4());
    }

    /**
     * @param non-empty-string $namespace
     */
    public static function fromNamespace(string $namespace): static
    {
        return new static(Uuid::uuid5(Uuid::uuid4(), $namespace));
    }

    /**
     * @param non-empty-string $value
     */
    public static function fromString(string $value): static
    {
        return new static(Uuid::fromString($value));
    }

    /**
     * @param \DateTimeInterface $date
     */
    public static function fromDate(\DateTimeInterface $date): static
    {
        return new static(Uuid::uuid7($date));
    }

    public static function nil(): static
    {
        return new static(Uuid::NIL);
    }

    public static function max(): static
    {
        return new static(Uuid::MAX);
    }

    public function toUuid(): UuidInterface
    {
        return Uuid::fromString($this->value);
    }

    /**
     * @return non-empty-string
     */
    public function jsonSerialize(): string
    {
        return $this->value;
    }

    public function same(ValueObjectInterface $object): bool
    {
        return $this->value === (string)$object;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
