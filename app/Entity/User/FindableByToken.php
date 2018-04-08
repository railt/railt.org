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
 * Interface ProvidesUserToken
 */
interface FindableByToken
{
    /**
     * @param FindableById $users
     * @param string $token
     * @return User|null
     */
    public function getUser(FindableById $users, string $token): ?User;
}
