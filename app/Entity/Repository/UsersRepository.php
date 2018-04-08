<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Repository;

use App\Entity\AuthenticationService;
use App\Entity\User;
use Laravel\Socialite\Contracts\User as UserInterface;
use Serafim\Hydrogen\Repository\DatabaseRepository;

/**
 * Class UsersRepository
 */
class UsersRepository extends DatabaseRepository implements
    User\FindableById,
    User\FindableByLogin,
    User\FindableByEmail,
    User\CreatableFromSocialite
{
    /**
     * @param int $pk
     * @return User|null|object
     */
    public function findById(int $pk): ?User
    {
        return $this->find($pk);
    }

    /**
     * @param string $login
     * @return User|null|object
     */
    public function findByLogin(string $login): ?User
    {
        return $this->query->where('login', $login)->first();
    }

    /**
     * @param string $email
     * @return User|null|object
     */
    public function findByEmail(string $email): ?User
    {
        return $this->query->where('email.value', $email)->first();
    }

    /**
     * @param UserInterface|\Laravel\Socialite\Two\User $prototype
     * @return User
     */
    private function createFromSocialite(UserInterface $prototype): User
    {
        $temporaryPassword = \property_exists($prototype, 'token')
            ? $prototype->token
            : $prototype->getId();

        $user = new User($prototype->getNickname(), $temporaryPassword);
        $user->avatar()->update($prototype->getAvatar());
        $user->email()->update($prototype->getEmail());

        return $user;
    }

    /**
     * @param string $service
     * @param UserInterface|\Laravel\Socialite\Two\User $prototype
     * @return User
     */
    public function fromSocialite(string $service, UserInterface $prototype): User
    {
        $user = $this->findByEmail($prototype->getEmail() ?? '') ??
            $this->createFromSocialite($prototype);

        $user->authBy(new AuthenticationService($service, (string)$prototype->getId(), $user));

        return $user;
    }
}
