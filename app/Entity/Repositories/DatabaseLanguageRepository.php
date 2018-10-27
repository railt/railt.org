<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Repositories;

use App\Entity\Language;
use Doctrine\ORM\EntityRepository;
use RDS\Hydrogen\Hydrogen;
use RDS\Hydrogen\Query;

/**
 * Class DatabaseLanguageRepository
 */
class DatabaseLanguageRepository extends EntityRepository implements LanguageRepository
{
    use Hydrogen;

    /**
     * @param string $code
     * @return Query
     * @throws \InvalidArgumentException
     */
    public function whereCode(string $code): Query
    {
        return $this->query->where('code', $code);
    }

    /**
     * @param string $code
     * @param string|null $fallback
     * @return Language|null
     * @throws \InvalidArgumentException
     * @throws \LogicException
     */
    public function findByCode(string $code, string $fallback = null): ?Language
    {
        /** @var Query|$this $query */
        $query = $this->whereCode($code);

        if ($fallback !== null) {
            $query = $query->or->whereCode($code);
        }

        return $query->take(1)->first();
    }
}
