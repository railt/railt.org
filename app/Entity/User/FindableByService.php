<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\User;

use App\Entity\User;

/**
 * Interface FindableByService
 */
interface FindableByService
{
    /**
     * @param string $name
     * @param string $userId
     * @return User|null
     */
    public function findByService(string $name, string $userId): ?User;
}
