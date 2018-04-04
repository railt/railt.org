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
use Serafim\Hydrogen\Repository\DatabaseRepository;

/**
 * Class MenuRepository
 */
class MenuRepository extends DatabaseRepository implements ProvidesMenu, ProvidesMenuTree
{
    /**
     * @param Menu ...$parents
     * @return Collection
     * @throws \LogicException
     */
    public function findByParents(Menu ...$parents): Collection
    {
        $query = $this->query;

        if (\count($parents)) {
            $query->whereIn('parent', $parents);
        } else {
            $query->whereNull('parent');
        }

        return $query->get();
    }

    /**
     * @param string $urn
     * @return Menu|null|object
     */
    public function findByUrn(string $urn): ?Menu
    {
        return $this->query->where('urn', $urn)->first();
    }
}
