<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\GraphQL\Out;

use App\Entity\User;

/**
 * Class UserPresenter
 */
class UserPresenter
{
    /**
     * @param User $user
     * @return iterable
     */
    public function toArray(User $user): iterable
    {
        return [
            'id'        => $user->getId(),
            'login'     => $user->credentials()->getLogin(),
            'email'     => $user->email()->toString() ?: null,
            'avatar'    => $user->avatar()->toUrl(),
            'abilities' => $user->getAbilities(),
            'updatedAt' => $user->updatedAt() ?? $user->createdAt(),
            'createdAt' => $user->createdAt(),
        ];
    }
}
