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

/**
 * Trait UpdatedAt
 */
trait UpdatedAt
{
    /**
     * @var Carbon|null
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
     */
    public function touch(): void
    {
        $this->updated = Carbon::now();
    }
}
