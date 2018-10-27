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
 * Class Avatar
 */
class Avatar
{
    /**
     * @var string|null
     */
    protected $path;

    /**
     * Avatar constructor.
     * @param string|null $path
     */
    public function __construct(string $path = null)
    {
        $this->path = $path;
    }

    /**
     * @param string $path
     * @return $this
     */
    public function update(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @return $this
     */
    public function remove(): self
    {
        $this->path = null;

        return $this;
    }

    /**
     * @return string
     */
    public function toUrl(): string
    {
        if ($this->path) {
            return $this->path;
        }

        // TODO
        return '';
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toUrl();
    }
}
