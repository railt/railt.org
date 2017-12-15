<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity;

use App\Entity\Source\Type;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Common\Identifiable;
use App\Entity\Common\Timestampable;

/**
 * @ORM\Entity()
 * @ORM\Table(name="sources")
 * @ORM\HasLifecycleCallbacks()
 */
class Source
{
    use Identifiable;
    use Timestampable;

    protected const DEFAULT_BRANCH = 'master';
    protected const DEFAULT_PATH = 'master';

    /**
     * @var string
     * @ORM\Column(name="user", type="string")
     */
    private $user;

    /**
     * @var string
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var string
     * @ORM\Column(name="branch", type="string")
     */
    private $branch = self::DEFAULT_BRANCH;

    /**
     * @var string
     * @ORM\Column(name="path", type="string")
     */
    private $path = self::DEFAULT_PATH;

    /**
     * @var string
     * @ORM\Column(name="type", type="string")
     */
    private $type = Type::COMMON;

    /**
     * Repository constructor.
     * @param string $user
     * @param string $name
     */
    public function __construct(string $user, string $name)
    {
        $this->user = $user;
        $this->name = $name;
    }

    /**
     * Create from "org/repo" uri
     *
     * @param string $dsn
     * @return Source
     */
    public static function create(string $dsn): Source
    {
        return new static(...\explode('/', \trim($dsn, '/')));
    }

    /**
     * @param string $branch
     * @return Source
     */
    public function using(string $branch): Source
    {
        $this->branch = $branch;

        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $path
     * @return Source
     */
    public function from(string $path): Source
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getUri();
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        $path = \trim($this->path, '/');

        return \vsprintf('https://github.com/%s/%s/tree/%s%s', [
            $this->user,
            $this->name,
            $this->branch,
            $path ? '/' . $path : '',
        ]);
    }

    /**
     * @param string|null $path
     * @return array
     */
    public function toConfigArray(string $path = null): array
    {
        return [
            $this->getUser(),
            $this->getName(),
            $path ?? $this->getPath(),
            $this->getBranch(),
        ];
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getBranch(): string
    {
        return $this->branch;
    }
}
