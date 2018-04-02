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
 * Interface Updatable
 */
interface Updatable
{
    /**
     * @return Carbon|null
     */
    public function updatedAt(): ?Carbon;

    /**
     * @return void
     */
    public function touch(): void;
}
