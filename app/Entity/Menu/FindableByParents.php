<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Menu;

use App\Entity\Menu;

/**
 * Interface FindableByParents
 */
interface FindableByParents
{
    /**
     * @param Menu[] $parents
     * @return \Traversable|Menu[]
     */
    public function findByParents(Menu ...$parents): \Traversable;

    /**
     * @param Menu|null $parent
     * @return Menu|null
     */
    public function findByParent(?Menu $parent): ?Menu;
}
