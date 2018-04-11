<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Content;

use App\Entity\Renderer;
use Illuminate\Support\Str;

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
     * MarkdownRenderer constructor.
     * @param \Parsedown $pd
     */
    public function __construct(\Parsedown $pd)
    {
        $this->pd = $pd;
    }

    /**
     * @param string $content
     * @return string
     */
    private function preFormatBlockQuotes(string $content): string
    {
        return \preg_replace_callback('/^(\!|\?)>(.*?)$/sum', function(array $d) {
            return '>' . $d[1] . ' ' . $d[2];
        }, $content) ?? $content;
    }

    /**
     * @param string $content
     * @return string
     */
    private function formatBlockQuotes(string $content): string
    {
        return \preg_replace_callback('/<blockquote>.*?<p>(\!|\?)(.*?)<\/p>.*?<\/blockquote>/sum', function(array $d) {
            $class = function(string $char): string {
                switch ($char) {
                    case '!': return 'warn';
                    case '?': return 'info';
                    default: return 'default';
                }
            };

            return \sprintf('<blockquote class="%s">', $class($d[1]))
                . '<p>' . $d[2] . '</p></blockquote>';
        }, $content);
    }

    /**
     * @param string $content
     * @return string
     */
    private function formatHeaders(string $content): string
    {
        return \preg_replace_callback('/<h(\d+)>(.*?)<\/h\d+>/isum', function(array $d) {
            [$data, $heading, $title] = $d;
            $slug = Str::slug(\strip_tags($title));

            return \vsprintf('<h%d><a href="#%s" id="%2$s" name="%2$s" class="header-link">#</a>%s</h%1$d>', [
                $heading,
                $slug,
                $title
            ]);
        }, $content);
    }

    /**
     * @param string $content
     * @return string
     */
    public function render(string $content): string
    {
        $content = $this->preFormatBlockQuotes($content);

        $content = $this->pd->parse($content);

        $content = $this->formatBlockQuotes($content);
        $content = $this->formatHeaders($content);

        return $content;
    }
}
