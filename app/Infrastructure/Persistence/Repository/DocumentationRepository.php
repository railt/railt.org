<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\Documentation;
use App\Domain\DocumentationRepositoryInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @template-extends DatabaseRepository<Documentation>
 */
class DocumentationRepository extends DatabaseRepository implements DocumentationRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Documentation::class);
    }

    public function findByPath(string $path): ?Documentation
    {
        if ($path === '') {
            return null;
        }

        return $this->findOneBy(['url' => $path ?: 'quick-start']);
    }
}
