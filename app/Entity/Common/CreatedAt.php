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
 * Trait CreatedAt
 */
trait CreatedAt
{
    /**
     * @var Carbon|null
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
     */
    public function actualize(): Carbon
    {
        return $this->created = Carbon::now();
    }
}
