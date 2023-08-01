<?php

declare(strict_types=1);

namespace App\Domain\Documentation\Menu;

use Doctrine\Persistence\ObjectRepository;

/**
 * @template-extends ObjectRepository<Link>
 */
interface LinkRepositoryInterface extends ObjectRepository
{
    /**
     * @return iterable<Link>
     */
    public function findAll(): iterable;
}
