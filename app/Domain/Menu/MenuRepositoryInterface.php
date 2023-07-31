<?php

declare(strict_types=1);

namespace App\Domain\Menu;

use App\Domain\Menu\Menu;
use Doctrine\Persistence\ObjectRepository;

/**
 * @template-extends ObjectRepository<Menu>
 */
interface MenuRepositoryInterface extends ObjectRepository
{
    /**
     * @return iterable<Menu>
     */
    public function findAll(): iterable;
}
