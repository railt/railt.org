<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Type;

use App\Domain\Documentation\Search\IndexId;

final class IndexIdType extends UniversalUniqueIdType
{
    protected static function getClass(): string
    {
        return IndexId::class;
    }
}
