<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity;

use App\Entity\Common\Identifiable;
use App\Entity\Common\Identifier;
use App\Entity\Common\Timestampable;
use App\Entity\Common\Timestamps;
use App\Entity\User\Authentication;
use App\Entity\User\Authorization;
use App\Entity\User\Avatar;
use App\Entity\User\Credentials;
use App\Entity\User\Email;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable;
use App\Entity\Repository\UsersRepository;
use Illuminate\Contracts\Hashing\Hasher;

/**
 * Class User
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 * @ORM\Table(name="users")
 * @ORM\HasLifecycleCallbacks()
 */
class User implements Identifiable, Timestampable, Authenticatable, Authorizable
{
    use Identifier;
    use Timestamps;
    use Authentication;
    use Authorization;

    /**
     * @ORM\Embedded(class=Email::class, columnPrefix=false)
     * @var Email
     */
    protected $email;

    /**
     * @ORM\Embedded(class=Avatar::class, columnPrefix=false)
     * @var Avatar
     */
    protected $avatar;

    /**
     * @ORM\Embedded(class=Credentials::class, columnPrefix=false)
     * @var Credentials
     */
    protected $credentials;

    /**
     * @ORM\OneToMany(targetEntity=AuthenticationService::class, mappedBy="user", orphanRemoval=true, cascade={"persist"})
     * @var Collection|AuthenticationService[]
     */
    protected $services = [];

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
     * @param AuthenticationService $service
     * @return $this
     */
    public function authBy(AuthenticationService $service): self
    {
        $this->services->add($service);

        return $this;
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
