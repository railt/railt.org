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
 * Interface ProvidesMenuTree
 */
interface ProvidesMenuTree
{
    /**
     * @param Menu[] $parents
     * @return Collection
     */
    public function findByParents(Menu ...$parents): Collection;
}
