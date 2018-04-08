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
 * Interface FindableByLogin
 */
interface FindableByLogin
{
    /**
     * @param string $login
     * @return User|null
     */
    public function findByLogin(string $login): ?User;
}
