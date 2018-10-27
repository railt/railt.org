<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Renderer;

use Renderer\Hook\HookInterface;

/**
 * Interface RendererInterface
 */
interface RendererInterface
{
    /**
     * @param HookInterface $hook
     */
    public function addHook(HookInterface $hook): void;

    /**
     * @param string $content
     * @return ResultInterface
     */
    public function render(string $content): ResultInterface;
}
