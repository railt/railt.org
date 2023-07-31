<?php

namespace App\Repository;

use App\Entity\SearchIndex;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SearchIndexRepository extends ServiceEntityRepository
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
