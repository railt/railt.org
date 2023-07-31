<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Type;

use App\Domain\Documentation\PageId;

final class PageIdType extends UniversalUniqueIdType
{
    protected static function getClass(): string
    {
        return PageId::class;
    }
}
