<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\GraphQL\Controllers;

use App\Entity\Menu;
use App\Entity\Repository\ProvidesMenuTree;
use Railt\Http\InputInterface;

/**
 * Class MenuController
 */
class MenuController
{
    /**
     * @param ProvidesMenuTree $menus
     * @return \Traversable|Menu[]
     */
    public function findRootItems(ProvidesMenuTree $menus): \Traversable
    {
        return $menus->findByParents();
    }

    /**
     * @param InputInterface $input
     * @param ProvidesMenuTree $menus
     * @return \Traversable|Menu[]
     */
    public function findChildren(InputInterface $input, ProvidesMenuTree $menus): \Traversable
    {
        return $menus->findByParents(...$input->getParent());
    }
}
