<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Documentation;

use App\Entity\Documentation;

/**
 * Interface ContainsDocumentationPages
 */
interface ContainsDocumentationPages
{
    /**
     * @return \Traversable|Documentation[]
     */
    public function getDocumentationPages(): \Traversable;
}
