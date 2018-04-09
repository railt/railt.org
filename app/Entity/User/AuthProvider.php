<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\User;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Str;
use Serafim\Hydrogen\Query;
use Serafim\Hydrogen\Repository\ObjectRepository;

/**
 * Class AuthProvider
 */
class AuthProvider implements UserProvider
{
    /**
     * @var Hasher
     */
    private $hash;

    /**
     * @var EntityManagerInterface|EntityManager
     */
    private $em;

    /**
     * @var ObjectRepository
     */
    private $repository;

    /**
     * @var Authorizable|Authenticatable
     */
    private $user;

    /**
     * AuthProvider constructor.
     * @param Hasher $hash
     * @param EntityManagerInterface $em
     * @param string $entity
     * @throws \ReflectionException
     */
    public function __construct(Hasher $hash, EntityManagerInterface $em, string $entity)
    {
        $this->em = $em;
        $this->hash = $hash;
        $this->repository = $this->em->getRepository($entity);
        $this->user = (new \ReflectionClass($entity))->newInstanceWithoutConstructor();
    }

    /**
     * @param mixed $identifier
     * @return Authenticatable|null|object
     */
    public function retrieveById($identifier): ?Authenticatable
    {
        return $this->repository->find($identifier);
    }

    /**
     * @param mixed $identifier
     * @param string $token
     * @return Authenticatable|null|object
     * @throws \LogicException
     */
    public function retrieveByToken($identifier, $token): ?Authenticatable
    {
        $query = Query::new()
            ->where($this->user->getAuthIdentifierName(), $identifier)
            ->where($this->user->getRememberTokenName(), $token);

        return $this->repository->findOneBy($query);
    }

    /**
     * @param Authenticatable $user
     * @param string $token
     */
    public function updateRememberToken(Authenticatable $user, $token): void
    {
        $user->setRememberToken($token);

        $this->em->persist($user);
        $this->em->flush($user);
    }

    /**
     * @param array $credentials
     * @return Authenticatable|null|object
     * @throws \LogicException
     */
    public function retrieveByCredentials(array $credentials)
    {
        $query = Query::new();

        foreach ($credentials as $key => $value) {
            if (! Str::contains($key, 'password')) {
                $query = $query->where($key, $value);
            }
        }

        return $this->repository->findOneBy($query);
    }

    /**
     * @param Authenticatable $user
     * @param array $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials): bool
    {
        return $this->hash->check($credentials['password'] ?? '', $user->getAuthPassword());
    }
}
