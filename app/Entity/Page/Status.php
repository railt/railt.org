<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Page;

/**
 * Class Status
 */
class Status
{
    /**
     *
     */
    public const ACTUAL = 2;

    /**
     *
     */
    public const OBSOLETE = 4;

    /**
     *
     */
    public const NOT_FOUND = 8;
}
