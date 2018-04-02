<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Repository;

use App\Entity\Language;

/**
 * Interface ProvidesLanguage
 */
interface ProvidesLanguage
{
    /**
     * @param string $name
     * @return Language|null
     */
    public function findByName(string $name): ?Language;
}
