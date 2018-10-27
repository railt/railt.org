<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity;

use App\Authentication\Authentication;
use App\Authentication\Authorization;
use App\Entity\Common\Identifiable;
use App\Entity\Common\Identifier;
use App\Entity\Common\Timestampable;
use App\Entity\Common\Timestamps;
use App\Entity\User\Avatar;
use App\Entity\User\Credentials;
use App\Entity\User\Email;
use Doctrine\Common\Collections\ArrayCollection;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Hashing\Hasher;

/**
 * Class User
 */
class User implements
    Identifiable,
    Timestampable,
    Authorizable,
    Authenticatable
{
    use Identifier;
    use Timestamps;
    use Authorization;
    use Authentication;

    /**
     * @var Email
     */
    protected $email;

    /**
     * @var Avatar
     */
    protected $avatar;

    /**
     * @var Credentials
     */
    protected $credentials;

    /**
     * @var ArrayCollection|UserAuthentication[]
     */
    protected $services;

    /**
     * User constructor.
     * @param string $login
     * @param string $password
     * @param Hasher|null $hasher
     */
    public function __construct(string $login, string $password, Hasher $hasher = null)
    {
        $this->email  = new Email();
        $this->avatar = new Avatar();
        $this->credentials = new Credentials($login, $password, $hasher);
        $this->services = new ArrayCollection();

        $this->actualize();
    }

    /**
     * @param string $name
     * @return $this
     */
    public function addAbility(string $name): self
    {
        $this->abilities[] = $name;

        return $this;
    }

    /**
     * @return array|string[]
     */
    public function getAbilities(): array
    {
        return $this->abilities;
    }

    /**
     * @return Email
     */
    public function email(): Email
    {
        return $this->email;
    }

    /**
     * @return Avatar
     */
    public function avatar(): Avatar
    {
        return $this->avatar;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->credentials()->getLogin();
    }

    /**
     * @return Credentials
     */
    public function credentials(): Credentials
    {
        return $this->credentials;
    }
}
