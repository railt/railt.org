<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Renderer;

/**
 * Interface ResultInterface
 */
interface ResultInterface
{
    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @return string
     */
    public function getContent(): string;

    /**
     * @param string $content
     */
    public function update(string $content): void;

    /**
     * @return iterable
     */
    public function getNavigation(): iterable;
}
