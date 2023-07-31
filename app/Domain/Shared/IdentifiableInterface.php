<?php

declare(strict_types=1);

namespace App\Domain\Shared;

interface IdentifiableInterface
{
    /**
     * @return IdInterface
     */
    public function getId(): IdInterface;
}
