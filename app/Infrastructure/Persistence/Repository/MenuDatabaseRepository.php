<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\Menu\Menu;
use App\Domain\Menu\MenuRepositoryInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @template-extends DatabaseRepository<Menu>
 */
class MenuDatabaseRepository extends DatabaseRepository implements MenuRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Menu::class);
    }

    /**
     * @return iterable<Menu>
     */
    public function findAll(): iterable
    {
        return parent::findBy(['parent' => null], ['priority' => 'ASC']);
    }
}
