<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Services\Renderer;

use cebe\markdown\GithubMarkdown;

/**
 * Class MarkdownRenderer
 */
class MarkdownRenderer implements ContentRenderer
{
    /**
     * @var GithubMarkdown
     */
    private $markdown;

    /**
     * MarkdownRenderer constructor.
     * @param GithubMarkdown $markdown
     */
    public function __construct(GithubMarkdown $markdown)
    {
        $this->markdown = $markdown;
    }

    /**
     * @param string $result
     * @return string
     */
    public function render(string $result): string
    {
        $result = $this->parseExtendedMarkdown($result);

        $result = $this->markdown->parse($result);

        $result = $this->parseLinks($result);
        $result = $this->parseQuotes($result);
        $result = $this->parseListImprovements($result);

        return $result;
    }

    /**
     * @param string $body
     * @return string
     */
    private function parseListImprovements(string $body): string
    {
        $pattern = '/<li>(?!<)(.*?)<ul>/isu';

        return \preg_replace($pattern, '<p>$1</p>', $body);
    }

    /**
     * Заменяет все вхождения вида "> {tip}" на "<blockquote class="quote-tip">".
     *
     * @param string $body
     * @return string
     */
    private function parseExtendedMarkdown(string $body): string
    {
        $pattern = '/(\s*)([\!\?])>/iu';

        return \preg_replace_callback($pattern, function (array $params): string {
            [$body, $space, $char] = $params;

            [$prefix, $suffix] = [$char, ''];

            switch ($char) {
                case '?':
                    $prefix = '';
                    $suffix = '{tip}'; break;
                case '!':
                    $prefix = '';
                    $suffix = '{notice}'; break;
            }

            return $space . $prefix . '> ' . $suffix;
        }, $body) ?? $body;
    }

    /**
     * Заменяет все вхождения вида "> {tip}" на "<blockquote class="quote-tip">".
     *
     * @param string $body
     * @return string
     */
    private function parseQuotes(string $body): string
    {
        $pattern = '/<blockquote>\s*<p>\s*{([a-z]+)}\s*(.*?)<\/p>\s*<\/blockquote>/isu';
        $replacement = '<blockquote class="quote-$1"><p>$2</p></blockquote>';

        return preg_replace($pattern, $replacement, $body) ?? $body;
    }

    /**
     * @param string $body
     * @return string
     */
    private function parseLinks(string $body): string
    {
        $pattern = '/<a href="\/(.*?)"/isu';

        return preg_replace_callback($pattern, function (array $params): string {
            [$body, $uri] = $params;

            $route = \route('docs', [
                'page' => $uri === 'README' ? '/' : $uri
            ]);

            return '<a href="' . \str_replace(\asset(''), '/', $route) . '"';
        }, $body) ?? $body;
    }
}
