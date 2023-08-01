<?php

declare(strict_types=1);

namespace App\Domain\Documentation\Search;

final readonly class Result
{
    /**
     * @param Index $index
     * @param list<non-empty-string> $occurrences
     */
    public function __construct(
        public Index $index,
        public array $occurrences = [],
    ) {
    }
}
