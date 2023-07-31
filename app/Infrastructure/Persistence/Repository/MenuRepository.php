<?php

namespace App\Infrastructure\Persistence\Repository;

use App\Domain\Menu;
use App\Domain\MenuRepositoryInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @template-extends DatabaseRepository<Menu>
 */
class MenuRepository extends DatabaseRepository implements MenuRepositoryInterface
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
