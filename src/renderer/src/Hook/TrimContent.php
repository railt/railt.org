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
 * Class TrimContent
 */
class TrimContent extends BaseHook
{
    /**
     * @param string $rendered
     * @return string
     */
    public function after(string $rendered): string
    {
        return \trim($rendered);
    }
}
