<?php

namespace App\Repository;

use App\Entity\Menu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class MenuRepository extends ServiceEntityRepository
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
