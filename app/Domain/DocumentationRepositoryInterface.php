<?php

declare(strict_types=1);

namespace App\Domain;

use Doctrine\Persistence\ObjectRepository;

/**
 * @template-extends ObjectRepository<Documentation>
 */
interface DocumentationRepositoryInterface extends ObjectRepository
{
    /**
     * @param string $path
     * @return ($path is non-empty-string ? Documentation|null : null)
     */
    public function findByPath(string $path): ?Documentation;
}
