<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\User;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trait Authentication
 * @ORM\HasLifecycleCallbacks()
 */
trait Authentication
{
    /**
     * @ORM\Column(name="remember_token", type="string", length=100)
     * @var string|null
     */
    protected $rememberToken;

    /**
     * @return string
     */
    public function getAuthIdentifierName(): string
    {
        return 'id';
    }

    /**
     * @return int|null
     */
    public function getAuthIdentifier(): ?int
    {
        \assert(\method_exists($this, 'getId'));

        return $this->getId();
    }

    /**
     * @return string
     */
    public function getAuthPassword(): string
    {
        /** @var Credentials $credentials */
        $credentials = $this->credentials();

        \assert($credentials !== null);

        return $credentials->getHashedPassword();
    }

    /**
     * @return null|string
     */
    public function getRememberToken(): ?string
    {
        \assert(\property_exists($this, 'rememberToken'));

        return $this->rememberToken;
    }

    /**
     * @param string $value
     */
    public function setRememberToken($value): void
    {
        \assert(\property_exists($this, 'rememberToken'));
        \assert(\is_string($value) || $value === null);

        $this->rememberToken = $value;
    }

    /**
     * @return string
     */
    public function getRememberTokenName(): string
    {
        return 'remember_token';
    }
}
