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
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Interface ProvidesToken
 */
interface ProvidesToken
{
    /**
     * @param User|Authenticatable $user
     * @return string
     */
    public function token(User $user): string;
}
