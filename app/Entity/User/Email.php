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
 * Class Email
 * @ORM\Embeddable()
 */
class Email
{
    /**
     * @ORM\Column(name="email", type="string", nullable=true)
     * @var string|null
     */
    private $value;

    /**
     * Email constructor.
     * @param string|null $email
     */
    public function __construct(string $email = null)
    {
        $this->value = $email;
    }

    /**
     * @return bool
     */
    public function exists(): bool
    {
        return $this->value !== null;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function update(string $email): self
    {
        $this->value = $email;

        return $this;
    }

    /**
     * @return $this
     */
    public function remove(): self
    {
        $this->value = null;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->value ?? '';
    }
}
