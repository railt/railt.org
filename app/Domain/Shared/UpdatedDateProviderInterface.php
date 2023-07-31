<?php

declare(strict_types=1);

namespace App\Domain\Shared;

use Psr\Clock\ClockInterface;

/**
 * Each object that contains this interface supports the ability to obtain
 * information about the date of the last update of this object after saving
 * it to the database.
 */
interface UpdatedDateProviderInterface
{
    /**
     * Returns the date the object was last updated. Returns {@see null} if the
     * object has never been updated.
     */
    public function updatedAt(): ?\DateTimeImmutable;

    /**
     * Updates instance date using given datetime object.
     */
    public function touch(\DateTimeInterface|ClockInterface $now): void;
}
