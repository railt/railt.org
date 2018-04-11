<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Content\Rule;

/**
 * Interface Before
 */
interface Before
{
    /**
     * @param string $content
     * @return string
     */
    public function before(string $content): string;
}
