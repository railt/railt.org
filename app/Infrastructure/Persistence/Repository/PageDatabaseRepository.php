<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\Documentation\Page;
use App\Domain\Documentation\PageRepositoryInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @template-extends DatabaseRepository<Page>
 */
class PageDatabaseRepository extends DatabaseRepository implements PageRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Page::class);
    }

    public function findByPath(string $path): ?Page
    {
        if ($path === '') {
            return null;
        }

        return $this->findOneBy(['url' => $path ?: 'quick-start']);
    }
}
