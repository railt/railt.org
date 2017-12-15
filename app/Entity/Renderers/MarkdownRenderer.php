<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Renderers;

use Michelf\MarkdownExtra;

/**
 * Class MarkdownRenderer
 */
class MarkdownRenderer implements Renderer
{
    /**
     * @var \Parsedown
     */
    private $renderer;

    /**
     * MarkdownRenderer constructor.
     * @param \Parsedown $renderer
     */
    public function __construct(\Parsedown $renderer)
    {
        $this->renderer = $renderer;
    }

    /**
     * @param string $content
     * @return string
     */
    public function render(string $content): string
    {
        return $this->renderer->text($content);
    }
}
