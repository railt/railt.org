<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Repositories\CountryZoneRepository;

use App\Entity\CountryZone;

/**
 * Interface FindableByIp
 */
interface FindableByIp
{
    /**
     * @param int $ip
     * @return CountryZone|null
     */
    public function findByLongIp(int $ip): ?CountryZone;

    /**
     * @param string $ip
     * @return CountryZone|null
     */
    public function findByIp(string $ip): ?CountryZone;
}
