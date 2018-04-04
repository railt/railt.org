<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Repository;

use App\Entity\Language;
use Serafim\Hydrogen\Collection;
use Serafim\Hydrogen\Repository\DatabaseRepository;

/**
 * Class LanguageRepository
 */
class LanguageRepository extends DatabaseRepository implements
    Language\ContainsLanguages,
    Language\FindableByName
{
    /**
     * @return \Traversable|Language[]|Collection
     */
    public function getLanguages(): \Traversable
    {
        return $this->findAll();
    }

    /**
     * @param string $name
     * @return Language|null|object
     */
    public function findByName(string $name): ?Language
    {
        return $this->query->where('name', $name)->first();
    }
}
