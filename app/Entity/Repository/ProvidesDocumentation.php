<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Repository;

use App\Entity\Documentation;

/**
 * Interface ProvidesDocumentation
 */
interface ProvidesDocumentation
{
    /**
     * @param string|null $urn
     * @return Documentation|null
     */
    public function findByUrn(?string $urn): ?Documentation;

    /**
     * @param null|string $path
     * @return Documentation|null
     */
    public function findByPath(string $path): ?Documentation;
}
