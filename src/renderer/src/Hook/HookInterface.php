<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Renderer\Hook;

/**
 * Interface HookInterface
 */
interface HookInterface
{
    /**
     * @param string $original
     * @return string
     */
    public function before(string $original): string;

    /**
     * @param string $rendered
     * @return string
     */
    public function after(string $rendered): string;
}
