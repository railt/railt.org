<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity;

use App\Entity\Common\Identifier;
use App\Entity\Common\Timestamps;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Common\Identifiable;
use App\Entity\Common\Timestampable;
use App\Entity\Repository\AuthenticationServiceRepository;

/**
 * @ORM\Entity(repositoryClass=AuthenticationServiceRepository::class)
 * @ORM\Table(name="user_authentifications")
 * @ORM\HasLifecycleCallbacks()
 */
class AuthenticationService implements Identifiable, Timestampable
{
    use Identifier;
    use Timestamps;

    /**
     * @ORM\Column(name="service", type="string")
     * @var string
     */
    protected $service;

    /**
     * @ORM\Column(name="user_service_id", type="string")
     * @var int
     */
    protected $serviceId;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="services", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * @var User
     */
    protected $user;

    /**
     * AuthenticationService constructor.
     * @param string $service
     * @param string $serviceUserId
     * @param User $user
     */
    public function __construct(string $service, string $serviceUserId, User $user)
    {
        $this->service = $service;
        $this->serviceId = (string)$serviceUserId;
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getService(): string
    {
        return $this->service;
    }

    /**
     * @return string
     */
    public function getServiceId(): string
    {
        return $this->serviceId;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}
