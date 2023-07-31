<?php

declare(strict_types=1);

namespace App\Domain\Shared;

use Doctrine\ORM\Mapping as ORM;
use Psr\Clock\ClockInterface;

/**
 * @mixin CreatedDateProviderInterface
 * @psalm-require-implements CreatedDateProviderInterface
 */
trait CreatedDateProvider
{
    /**
     * @psalm-suppress PropertyNotSetInConstructor
     */
    #[ORM\Column(name: 'created_at', type: 'datetimetz_immutable', nullable: false)]
    private \DateTimeImmutable $createdAt;

    /**
     * @see CreatedDateProviderInterface::createdAt()
     * @psalm-suppress RedundantPropertyInitializationCheck : Required for
     *                 suppression of "property initialization" error.
     */
    public function createdAt(): \DateTimeImmutable
    {
        return $this->createdAt ??= new \DateTimeImmutable();
    }

    /**
     * @see CreatedDateProviderInterface::wasCreatedAt()
     */
    public function wasCreatedAt(\DateTimeInterface|ClockInterface $date): void
    {
        if ($date instanceof ClockInterface) {
            $date = $date->now();
        }

        if ($date instanceof \DateTime) {
            $date = \DateTimeImmutable::createFromMutable($date);
        }

        $this->createdAt = clone $date;
    }
}
