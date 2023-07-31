<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @template TEntity of object
 *
 * @template-extends ServiceEntityRepository<TEntity>
 */
abstract class DatabaseRepository extends ServiceEntityRepository
{
}
