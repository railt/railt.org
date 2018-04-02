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
 * Trait UpdatedAt
 * @ORM\HasLifecycleCallbacks()
 */
trait UpdatedAt
{
    /**
     * @var Carbon|null
     * @ORM\Column(name="updated_at", type="carbon")
     */
    private $updated;

    /**
     * @return Carbon|null
     */
    public function updatedAt(): ?Carbon
    {
        return $this->updated;
    }

    /**
     * @return void
     * @ORM\PreUpdate()
     */
    public function touch(): void
    {
        $this->updated = Carbon::now();
    }
}
