<?php

declare(strict_types=1);

namespace App\Domain\Shared;

use Psr\Clock\ClockInterface;

/**
 * Each object that contains this interface supports the ability to obtain
 * information about the creation date of this object in the database.
 */
interface CreatedDateProviderInterface
{
    /**
     * Returns the creation date of the object.
     *
     * @return \DateTimeImmutable
     */
    public function createdAt(): \DateTimeImmutable;

    /**
     * The method forcibly updates the creation date of the object.
     *
     * @param \DateTimeImmutable|ClockInterface $date
     *
     * @return void
     */
    public function wasCreatedAt(\DateTimeImmutable|ClockInterface $date): void;
}
