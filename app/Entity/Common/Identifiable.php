<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Common;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trait Identifiable
 */
trait Identifiable
{
    /**
     * @var int
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     */
    private $id;

    /**
     * @return bool
     */
    public function isNew(): bool
    {
        return $this->id === null;
    }

    /**
     * @return bool
     */
    public function isExisting(): bool
    {
        return $this->id !== null;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return void
     */
    public function __clone()
    {
        $this->id = null;
    }
}
