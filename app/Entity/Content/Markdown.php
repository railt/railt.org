<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Content;

use App\Entity\Content\Rule\After;
use App\Entity\Content\Rule\Before;
use App\Entity\Content\Rule\BlockquoteFormatter;
use App\Entity\Content\Rule\CodeHighlight;
use App\Entity\Content\Rule\HeadersAnchors;
use App\Entity\Renderer;
use Highlight\Highlighter;

/**
 * Class Markdown
 */
class Markdown implements Renderer
{
    /**
     * @var \Parsedown
     */
    private $pd;

    /**
     * @var array|Before[]|After[]
     */
    private $rules = [];

    /**
     * MarkdownRenderer constructor.
     * @param \Parsedown $pd
     * @param Highlighter $hl
     */
    public function __construct(\Parsedown $pd, Highlighter $hl)
    {
        $this->pd = $pd;

        $this->rules[] = new BlockquoteFormatter();
        $this->rules[] = new HeadersAnchors();
        $this->rules[] = new CodeHighlight($hl);
    }

    /**
     * @param string $content
     * @return string
     */
    public function render(string $content): string
    {
        foreach ($this->rules as $hook) {
            if ($hook instanceof Before) {
                $content = $hook->before($content);
            }
        }

        $content = $this->pd->parse($content);

        foreach ($this->rules as $hook) {
            if ($hook instanceof After) {
                $content = $hook->after($content);
            }
        }

        return $content;
    }
}
