<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\GraphQL\Out;

use App\Entity\Menu;

/**
 * Class MenuPresenter
 */
class MenuPresenter
{
    /**
     * @param Menu $menu
     * @return iterable
     */
    public function fromEntity(Menu $menu): iterable
    {
        yield 'id'       => $menu->getId();
        yield 'urn'      => $menu->hasDocumentation() ? $menu->getUrn() : null;
        yield 'orderId'  => $menu->getOrderId();
        yield 'title'    => $menu->getTitle();
        yield 'type'     => $menu->isTab() ? 'TAB' : 'DOCUMENTATION_PAGE';

        yield from $this->withRelationKeys($menu);
    }

    /**
     * @param Menu $menu
     * @return \Generator
     */
    private function withRelationKeys(Menu $menu): \Generator
    {
        yield 'parentId' => $menu->getParentId();
    }
}
