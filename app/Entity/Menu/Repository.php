<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Menu;

use App\Entity\Language;
use App\Entity\Menu;
use RDS\Hydrogen\Query;
use RDS\Hydrogen\Repository\DatabaseRepository;

/**
 * Class Repository
 */
class Repository extends DatabaseRepository implements
    Menu\FindableByUrn,
    Menu\FindableByParents
{
    /**
     * @return iterable|Menu[]
     * @throws \LogicException
     */
    public function findRoot(): iterable
    {
        return $this->query->whereNull('parent')
            ->with('children.children.children.children')
            ->get();
    }

    /**
     * @param Menu|null $parent
     * @return Menu|null|object
     * @throws \LogicException
     */
    public function findByParent(?Menu $parent): ?Menu
    {
        $query = $this->query;

        if ($parent) {
            $query->where('parent', $parent);
        } else {
            $query->whereNull('parent');
        }

        return $query->first();
    }

    /**
     * @param string $urn
     * @return Menu|null|object
     * @throws \LogicException
     */
    public function findByUrn(string $urn): ?Menu
    {
        return $this->query->where('urn', $urn)->first();
    }
}
