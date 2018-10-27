<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Repositories;

use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Laravel\Socialite\Contracts\User as SocialiteUserInterface;
use RDS\Hydrogen\Hydrogen;

/**
 * Class DatabaseUserRepository
 */
class DatabaseUserRepository extends EntityRepository implements UserRepository
{
    use Hydrogen;

    public function fromSocialite(string $service, SocialiteUserInterface $user): User
    {
        throw new \LogicException('The ' . __METHOD__ . ' not implemented yet');
    }

    public function findByEmail(string $email): ?User
    {
        throw new \LogicException('The ' . __METHOD__ . ' not implemented yet');
    }

    public function findByLogin(string $login): ?User
    {
        throw new \LogicException('The ' . __METHOD__ . ' not implemented yet');
    }
}
