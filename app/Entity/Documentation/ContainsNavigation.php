<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Documentation;

/**
 * Interface ContainsNavigation
 */
interface ContainsNavigation
{
    /**
     * @return Navigation
     */
    public function getNavigation(): Navigation;
}
