<?php

declare(strict_types=1);

namespace App\Domain\Documentation;

use App\Domain\Documentation\Search\Index;
use App\Domain\Documentation\Search\IndexRepositoryInterface;
use App\Domain\Documentation\Search\Result;

final readonly class Search
{
    public const DEFAULT_LIMIT = 6;

    public function __construct(
        private IndexRepositoryInterface $indices,
    ) {}

    public function findAllByQuery(string $query, int $limit = self::DEFAULT_LIMIT): iterable
    {
        $sequences = $this->parseQuery($query);

        if ($sequences === []) {
            return [];
        }

        $indices = $this->indices->searchByWords($sequences, $limit);

        foreach ($indices as $index) {
            yield new Result($index, $this->getOccurrences($index, $sequences));
        }
    }

    /**
     * @return list<non-empty-string>
     */
    private function parseQuery(string $query): array
    {
        return \array_filter(\preg_split('/\s+/um', $query));
    }

    private function escape(string $sequence): string
    {
        return \preg_quote($sequence, '/');
    }

    /**
     * @param iterable<non-empty-string> $sequences
     * @return iterable<non-empty-string>
     */
    private function getOccurrences(Index $index, array $sequences): array
    {
        $sequences = \array_filter($sequences);
        $sequences = \array_map($this->escape(...), $sequences);

        $pcre = '/(' . \implode('|', $sequences) . ')/isum';

        \preg_match_all($pcre, $index->getTitle(), $matches);

        $result = \array_unique($matches[1] ?? []);
        $result = \array_filter($result);

        return $result;
    }
}
