<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Common;

use Carbon\Carbon;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trait Timestampable
 */
trait Timestampable
{
    /**
     * @var Carbon
     * @ORM\Column(name="created_at", type="carbon")
     */
    private $createdAt;

    /**
     * @var Carbon|null
     * @ORM\Column(name="updated_at", type="carbon", nullable=true)
     */
    private $updatedAt;

    /**
     * @return void
     */
    protected function bootTimestamps(): void
    {
        if ($this->createdAt === null) {
            $this->createdAt = Carbon::now();
        }
    }

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     * @return self|$this
     */
    public function touch()
    {
        $this->updatedAt = Carbon::now();

        return $this;
    }

    /**
     * @ORM\PrePersist()
     * @return Carbon
     */
    public function getCreated(): Carbon
    {
        return $this->createdAt ?? ($this->createdAt = Carbon::now());
    }

    /**
     * @return Carbon|null
     */
    public function getUpdated(): ?Carbon
    {
        return $this->updatedAt;
    }
}
