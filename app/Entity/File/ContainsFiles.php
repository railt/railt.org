<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\File;

use App\Entity\File;

/**
 * Interface ContainsFiles
 */
interface ContainsFiles
{
    public const STORAGE_DIRECTORY = 'docs';

    /**
     * @return \Traversable|File[]
     */
    public function getFiles(): \Traversable;
}
