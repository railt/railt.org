<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Repository;

use App\Entity\Menu;
use Serafim\Hydrogen\Collection;

/**
 * Interface ProvidesMenu
 */
interface ProvidesMenu
{
    /**
     * @param string $urn
     * @return Menu|null
     */
    public function findByUrn(string $urn): ?Menu;
}
