<?php

declare(strict_types=1);

namespace App\Domain\Documentation\Search;

use Doctrine\Persistence\ObjectRepository;

/**
 * @template-extends ObjectRepository<Index>
 */
interface IndexRepositoryInterface extends ObjectRepository
{
    /**
     * @param list<non-empty-string> $queries
     * @param int<1, max> $limit
     * @return iterable<Index>
     */
    public function searchByWords(array $queries, int $limit): iterable;
}
