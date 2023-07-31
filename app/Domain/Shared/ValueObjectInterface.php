<?php

declare(strict_types=1);

namespace App\Domain\Shared;

interface ValueObjectInterface extends \Stringable
{
    /**
     * @param self $object
     *
     * @return bool
     */
    public function same(self $object): bool;

    /**
     * @return non-empty-string
     */
    public function __toString(): string;
}
