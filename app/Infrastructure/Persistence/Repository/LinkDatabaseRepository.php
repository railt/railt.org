<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\Documentation\Menu\Link;
use App\Domain\Documentation\Menu\LinkRepositoryInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @template-extends DatabaseRepository<Link>
 */
class LinkDatabaseRepository extends DatabaseRepository implements LinkRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Link::class);
    }

    public function findAll(): iterable
    {
        return $this->findBy([], ['priority' => 'ASC']);
    }
}
