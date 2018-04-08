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
use Laravel\Socialite\Contracts\User as UserInterface;

/**
 * Interface CreatableFromSocialite
 */
interface CreatableFromSocialite
{
    /**
     * @param string $service
     * @param UserInterface $user
     * @return User
     */
    public function fromSocialite(string $service, UserInterface $user): User;
}
