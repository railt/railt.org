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
     * @return array
     */
    public function toArray(Menu $menu): array
    {
        return [
            'id'       => $menu->getId(),
            'urn'      => $menu->hasDocumentation() ? $menu->getUrn() : null,
            'orderId'  => $menu->getOrderId(),
            'title'    => $menu->getTitle(),
            'type'     => $menu->isTab() ? 'TAB' : 'DOCUMENTATION_PAGE',

            // Route relation
            'parentId' => $menu->getParentId(),
        ];
    }
}
