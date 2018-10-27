<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Repositories\MenuRepository;

use App\Entity\Language;
use App\Entity\Menu;

/**
 * Interface ContainsRootMenus
 */
interface ContainsRootMenus
{
    /**
     * @param Language $language
     * @return iterable|Menu[]
     */
    public function getRootItems(Language $language): iterable;
}
