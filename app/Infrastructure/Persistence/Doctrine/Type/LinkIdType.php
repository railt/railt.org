<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Type;

use App\Domain\Documentation\Menu\LinkId;

final class LinkIdType extends UniversalUniqueIdType
{
    protected static function getClass(): string
    {
        return LinkId::class;
    }
}
