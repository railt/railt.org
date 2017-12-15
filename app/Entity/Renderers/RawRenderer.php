<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Renderers;

/**
 * Class RawRenderer
 */
final class RawRenderer implements Renderer
{
    /**
     * @param string $content
     * @return string
     */
    public function render(string $content): string
    {
        return $content;
    }
}
