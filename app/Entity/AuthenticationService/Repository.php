<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\AuthenticationService;

use App\Entity\AuthenticationService;
use App\Entity\User;
use RDS\Hydrogen\Repository\DatabaseRepository;

/**
 * Class AuthenticationServiceRepository
 */
class Repository extends DatabaseRepository implements
    User\FindableByService
{
    /**
     * @param string $name
     * @param string $userId
     * @return User|null
     * @throws \LogicException
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
