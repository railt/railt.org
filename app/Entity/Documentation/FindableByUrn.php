<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Documentation;

use App\Entity\Documentation;

/***
 * Interface FindableByUrn
 */
interface FindableByUrn
{
    /**
     * @param string|null $urn
     * @return Documentation|null
     */
    public function findByUrn(?string $urn): ?Documentation;
}
