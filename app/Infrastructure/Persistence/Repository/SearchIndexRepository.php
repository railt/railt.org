<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\SearchIndex;
use App\Domain\SearchIndexRepositoryInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @template-extends DatabaseRepository<SearchIndex>
 */
class SearchIndexRepository extends DatabaseRepository implements SearchIndexRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SearchIndex::class);
    }

    /**
     * @param string $query
     * @return array<string>
     */
    public function getQueries(string $query): array
    {
        $words = \preg_split('/\s+/isum', $query);
        $words = \array_filter($words);

        return $words;
    }

    /**
     * @param array<string> $queries
     * @param positive-int $limit
     * @return iterable<SearchIndex>
     */
    public function searchByWords(array $queries, int $limit): iterable
    {
        $builder = $this->createQueryBuilder('idx');

        foreach ($queries as $q => $query) {
            $builder->orWhere('idx.title LIKE :query' . $q);
            $builder->setParameter('query' . $q, '%' . $query . '%');
        }

        return $builder
            ->orderBy('idx.level')
            //->groupBy('idx.page')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
        ;
    }
}
