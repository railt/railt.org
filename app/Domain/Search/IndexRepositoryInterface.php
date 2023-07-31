<?php

declare(strict_types=1);

namespace App\Domain\Search;

use Doctrine\Persistence\ObjectRepository;

/**
 * @template-extends ObjectRepository<Index>
 */
interface IndexRepositoryInterface extends ObjectRepository
{
    /**
     * @param string $query
     * @return list<non-empty-string>
     */
    public function getQueries(string $query): array;

    /**
     * @param list<non-empty-string> $queries
     * @param int<1, max> $limit
     * @return iterable<Index>
     */
    public function searchByWords(array $queries, int $limit): iterable;
}
