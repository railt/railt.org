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
     */
    public function __construct(string $login, string $password)
    {
        $this->login = $this->rename($login);
        $this->password = $this->updatePassword($password);
    }

    /**
     * @param string $password
     * @return $this
     */
    public function updatePassword(string $password): self
    {
        $this->password = \bcrypt($password);

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
}
