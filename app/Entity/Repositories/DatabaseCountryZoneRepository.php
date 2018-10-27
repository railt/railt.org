<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Repositories;

use App\Entity\CountryZone;
use Doctrine\ORM\EntityRepository;
use RDS\Hydrogen\Hydrogen;
use RDS\Hydrogen\Query;

/**
 * Class DatabaseCountryZoneRepository
 */
class DatabaseCountryZoneRepository extends EntityRepository implements
    CountryZoneRepository
{
    use Hydrogen;

    /**
     * @param int $ip
     * @return Query
     * @throws \InvalidArgumentException
     */
    public function whereIpIn(int $ip): Query
    {
        return $this->query
            ->where('ipFrom', '<=', $ip)
            ->where('ipTo', '>=', $ip);
    }

    /**
     * @param int $ip
     * @return CountryZone|null
     * @throws \InvalidArgumentException
     * @throws \LogicException
     */
    public function findByLongIp(int $ip): ?CountryZone
    {
        return $this->query->whereIpIn($ip)
            ->take(2)
            ->first();
    }

    /**
     * @param string $ip
     * @return CountryZone|null
     * @throws \InvalidArgumentException
     * @throws \LogicException
     */
    public function findByIp(string $ip): ?CountryZone
    {
        if (\is_int($longIp = \ip2long($ip))) {
            return $this->findByLongIp($longIp);
        }

        return null;
    }
}
