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
 * Class PageRenderer
 */
class ContentRenderer extends MarkdownRenderer
{
    /**
     * @param string $before
     * @return string
     */
    public function render(string $before): string
    {
        $before = $this->normalizeQuotes($before);
        $after  = parent::render($before);
        $after  = $this->applyQuoteClasses($after);

        return $after;
    }

    /**
     * @param string $content
     * @return string
     */
    private function normalizeQuotes(string $content): string
    {
        $pattern = '/^([!\?])>/um';

        return \preg_replace_callback($pattern, function(array $q) {
            switch ($q[1][0]) {
                case '!':
                    return "\n" . '> {note}';
                case '?':
                    return "\n" . '> {tip}';
            }

            return '>';
        }, $content);
    }

    private function applyQuoteClasses(string $content): string
    {
        $pattern = '/<blockquote>\s*<p>\s*{(\w+)}\s*/iu';

        return \preg_replace_callback($pattern, function(array $q) {
            return '<blockquote class="' . $q[1] . '"><p>';
        }, $content);
    }
}
