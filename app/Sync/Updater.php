<?php

declare(strict_types=1);

namespace App\Sync;

use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectRepository;

abstract class Updater
{
    /**
     * @var EntityManager
     */
    protected EntityManager $em;

    /**
     * @var ObjectRepository
     */
    protected ObjectRepository $repository;

    /**
     * @param EntityManager $em
     * @param ObjectRepository $repository
     */
    public function __construct(EntityManager $em, ObjectRepository $repository)
    {
        $this->em = $em;
        $this->repository = $repository;
    }

    /**
     * @return void
     */
    public function truncate(): void
    {
        $this->repository->createQueryBuilder('ctx')
            ->delete()
            ->getQuery()
            ->execute()
        ;
    }
}
