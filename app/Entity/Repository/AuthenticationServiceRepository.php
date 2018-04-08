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
use Serafim\Hydrogen\Repository\DatabaseRepository;

/**
 * Class AuthenticationServiceRepository
 */
class AuthenticationServiceRepository extends DatabaseRepository implements
    User\FindableByService
{
    /**
     * @param string $name
     * @param string $userId
     * @return User|null
     */
    public function findByService(string $name, string $userId): ?User
    {
        /** @var AuthenticationService|null $service */
        $service = $this->query
            ->where('service', $name)
            ->where('serviceId', $userId)
            ->first();

        return $service ? $service->getUser() : null;
    }
}
