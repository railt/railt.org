<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\GraphQL\Out;

use App\Entity\Documentation\Link;

/**
 * Class NavigationPresenter
 */
class NavigationPresenter
{
    /**
     * @param Link $nav
     * @return array
     */
    public function toArray(Link $nav): array
    {
        return [
            'slug'  => $nav->getSlug(),
            'level' => $nav->getLevel(),
            'title' => $nav->getTitle(),
        ];
    }
}
