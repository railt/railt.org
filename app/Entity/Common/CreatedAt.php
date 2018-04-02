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
 * Trait CreatedAt
 * @ORM\HasLifecycleCallbacks()
 */
trait CreatedAt
{
    /**
     * @var Carbon|null
     * @ORM\Column(name="created_at", type="carbon")
     */
    protected $created;

    /**
     * @return Carbon
     */
    public function createdAt(): Carbon
    {
        return $this->created ?? $this->actualize();
    }

    /**
     * @return Carbon
     * @ORM\PrePersist()
     */
    public function actualize(): Carbon
    {
        return $this->created = Carbon::now();
    }
}
