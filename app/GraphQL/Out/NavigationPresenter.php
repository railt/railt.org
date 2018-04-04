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
     * @return iterable
     */
    public function fromEntity(Link $nav): iterable
    {
        yield 'slug' => $nav->getSlug();
        yield 'level' => $nav->getLevel();
        yield 'title' => $nav->getTitle();
    }
}
