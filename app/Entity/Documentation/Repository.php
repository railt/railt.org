<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Documentation;

use App\Entity\Documentation;
use App\Entity\Language;
use RDS\Hydrogen\Collection;
use RDS\Hydrogen\Query;
use RDS\Hydrogen\Repository\DatabaseRepository;

/**
 * Class Repository
 */
class Repository extends DatabaseRepository implements
    Documentation\ContainsDocumentationPages,
    Documentation\FindableByPath,
    Documentation\FindableByUrn
{
    /**
     * @param Language $language
     * @return Query|$this
     * @throws \InvalidArgumentException
     */
    public function withLanguage(Language $language): Query
    {
        return $this->query
            ->with('language')
            ->where('language', $language);
    }

    /**
     * @return \Traversable|Collection|Documentation[]
     */
    public function getDocumentationPages(): iterable
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
