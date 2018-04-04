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
use Railt\Http\InputInterface;

/**
 * Class MenuController
 */
class MenuController
{
    /**
     * @var Menu\FindableByParents
     */
    private $menus;

    /**
     * MenuController constructor.
     * @param Menu\FindableByParents $menus
     */
    public function __construct(Menu\FindableByParents $menus)
    {
        $this->menus = $menus;
    }

    /**
     * @return \Traversable
     */
    public function findRootItems(): \Traversable
    {
        return $this->menus->findByParents();
    }

    /**
     * @param InputInterface $input
     * @return \Traversable
     */
    public function findChildren(InputInterface $input): \Traversable
    {
        return $this->menus->findByParents(...$input->getParent());
    }
}
