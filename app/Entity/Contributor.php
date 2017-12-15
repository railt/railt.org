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
use App\Entity\Common\Timestampable;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="contributors")
 * @ORM\HasLifecycleCallbacks()
 */
class Contributor
{
    use Identifiable;
    use Timestampable;

    /**
     * @var string
     * @ORM\Column(name="login", type="string")
     */
    private $login;

    /**
     * @var string
     * @ORM\Column(name="url", type="string")
     */
    private $url;

    /**
     * @var string
     * @ORM\Column(name="avatar", type="string")
     */
    private $avatar;

    /**
     * @var int
     * @ORM\Column(name="contributions", type="integer")
     */
    private $contributions = 0;

    /**
     * @var int
     * @ORM\Column(name="github_id", type="integer")
     */
    private $gitHubId;

    /**
     * Contributor constructor.
     * @param int $gitHubId
     * @param string $login
     * @param string $url
     * @param string $avatar
     */
    public function __construct(int $gitHubId, string $login, string $url, string $avatar)
    {
        $this->url = $url;
        $this->login = $login;
        $this->avatar = $avatar;
        $this->gitHubId = $gitHubId;
    }

    /**
     * @return int
     */
    public function getGitHubId(): int
    {
        return $this->gitHubId;
    }

    /**
     * @param array $data
     * @return static|Contributor
     */
    public static function fromArray(array $data): Contributor
    {
        return new static(
            $data['id'] ?? 0,
            $data['login'] ?? '',
            $data['html_url'] ?? $data['url'] ?? '',
            $data['avatar_url'] ?? $data['avatar'] ?? ''
        );
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
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * @param int $contributions
     * @return Contributor
     */
    public function addContributions(int $contributions): Contributor
    {
        $this->contributions += $contributions;

        return $this;
    }

    /**
     * @return int
     */
    public function getContributions(): int
    {
        return $this->contributions;
    }

    /**
     * @param Contributor $contributor
     * @return Contributor
     */
    public function update(Contributor $contributor): Contributor
    {
        $this->url = $contributor->getUrl();
        $this->login = $contributor->getLogin();
        $this->avatar = $contributor->getAvatar();
        $this->contributions = $contributor->getContributions();

        return $this;
    }
}
