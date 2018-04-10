<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\GraphQL\Controllers;

use App\Entity\User;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Class UserController
 */
class UserController
{
    /**
     * @param Authenticatable|null $user
     * @return User|Authenticatable|null
     */
    public function current(?Authenticatable $user): ?User
    {
        return $user;
    }
}
