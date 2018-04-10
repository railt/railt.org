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
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Facades\Hash;

/**
 * @ORM\Embeddable()
 */
class Credentials
{
    /**
     * @ORM\Column(name="login", type="string")
     * @var string
     */
    protected $login;

    /**
     * @ORM\Column(name="password", type="string")
     * @var string
     */
    protected $password;

    /**
     * Credentials constructor.
     * @param string $login
     * @param string $password
     * @param Hasher|null $hasher
     */
    public function __construct(string $login, string $password, Hasher $hasher = null)
    {
        $this->login = $login;
        $this->password = $this->updatePassword($password, $hasher);
    }

    /**
     * @param string $password
     * @param Hasher $hasher
     * @return $this
     */
    public function updatePassword(string $password, Hasher $hasher = null): self
    {
        $this->password = ($hasher ?? app(Hasher::class))->make($password);

        return $this;
    }

    /**
     * @param string $login
     * @return $this
     */
    public function rename(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    /**
     * @param string $password
     * @return bool
     */
    public function match(string $password): bool
    {
        return Hash::check($password, $this->password);
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getHashedPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function __toString(): string 
    {
        return $this->getLogin();
    }
}
