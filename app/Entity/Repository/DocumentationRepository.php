<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Repository;

use App\Entity\Documentation;
use Serafim\Hydrogen\Collection;
use Serafim\Hydrogen\Query\Builder;
use Serafim\Hydrogen\Repository\DatabaseRepository;

/**
 * Class DocumentationRepository
 */
class DocumentationRepository extends DatabaseRepository implements
    Documentation\ContainsDocumentationPages,
    Documentation\FindableByPath,
    Documentation\FindableByUrn
{
    /**
     * @param Builder $builder
     * @return Builder
     */
    public function scope(Builder $builder): Builder
    {
        return $builder->with('language');
    }

    /**
     * @return \Traversable|Collection|Documentation[]
     */
    public function getDocumentationPages(): \Traversable
    {
        return $this->findAll();
    }

    /**
     * @param string $urn
     * @return Documentation|object|null
     * @throws \LogicException
     */
    public function findByUrn(?string $urn): ?Documentation
    {
        return $this->query->where('urn', (string)$urn)->first();
    }

    /**
     * @param null|string $path
     * @return Documentation|null|object
     * @throws \LogicException
     */
    public function findByPath(string $path): ?Documentation
    {
        return $this->query->where('path', $path)->first();
    }
}
