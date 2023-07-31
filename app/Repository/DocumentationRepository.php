<?php

namespace App\Repository;

use App\Entity\Documentation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DocumentationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Documentation::class);
    }

    /**
     * @param string $path
     * @return Documentation|null
     */
    public function findByPath(string $path): ?Documentation
    {
        return $this->findOneBy(['url' => $path ?: 'quick-start']);
    }
}
