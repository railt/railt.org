<?php

declare(strict_types=1);

namespace App\Domain\Documentation;

use Doctrine\Persistence\ObjectRepository;

/**
 * @template-extends ObjectRepository<Page>
 */
interface PageRepositoryInterface extends ObjectRepository
{
    /**
     * @param string $path
     */
    public function findByPath(string $path): ?Page;
}
