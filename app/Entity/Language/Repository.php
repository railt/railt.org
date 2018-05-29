<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Language;

use App\Entity\Language;
use RDS\Hydrogen\Repository\DatabaseRepository;

/**
 * Class LanguageRepository
 */
class Repository extends DatabaseRepository implements
    Language\ContainsLanguages,
    Language\FindableByName
{
    /**
     * @return \Traversable|Language[]|iterable
     */
    public function getLanguages(): iterable
    {
        return $this->findAll();
    }

    /**
     * @param string $name
     * @return Language|null
     * @throws \InvalidArgumentException
     * @throws \LogicException
     */
    public function findByName(string $name): ?Language
    {
        return $this->query->where('name', $name)->first();
    }
}
