<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Language;

use App\Entity\Language;

/**
 * Interface ContainsLanguages
 */
interface ContainsLanguages
{
    /**
     * @return iterable|Language[]
     */
    public function getLanguages(): iterable;
}
