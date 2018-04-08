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
 * Interface FindableById
 */
interface FindableById
{
    /**
     * @param int $pk
     * @return User|null
     */
    public function findById(int $pk): ?User;
}
