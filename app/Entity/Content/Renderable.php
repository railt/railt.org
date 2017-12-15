<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Content;

use App\Entity\Content;
use App\Entity\Renderers\Renderer;

/**
 * Interface Renderable
 */
interface Renderable
{
    /**
     * @return Content
     */
    public function getContent(): Content;

    /**
     * @param Renderer $renderer
     * @param string|null $content
     * @return void
     */
    public function updateContent(Renderer $renderer, string $content = null): void;

    /**
     * @return string
     */
    public function getBody(): string;
}
