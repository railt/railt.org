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
 * Class MenuRenderer
 */
class MenuRenderer extends MarkdownRenderer
{
    /**
     *
     */
    private const URL_PATTERN = '/\-\s+\[(.*?)\]\((.*?)\)/isu';

    /**
     * @param string $before
     * @return string
     */
    public function render(string $before): string
    {
        $before = $this->parseRoot($before);
        $before = $this->normalizePaths($before);
        $before = $this->normalizeParagraphs($before);

        return parent::render($before);
    }

    /**
     * @param string $content
     * @return string
     */
    private function normalizeParagraphs(string $content): string
    {
        return \trim($content);
    }

    /**
     * @param string $content
     * @return string
     */
    private function parseRoot(string $content): string
    {
        return \preg_replace_callback(self::URL_PATTERN, function(array $data) {
            return \vsprintf('- [%s](%s)', [
                $data[1],
                \mb_strtolower(\ltrim($data[2], '/')) === 'readme' ? '/' : $data[2]
            ]);
        }, $content);
    }

    /**
     * @param string $content
     * @return string
     */
    private function normalizePaths(string $content): string
    {
        return \preg_replace_callback(self::URL_PATTERN, function(array $data) {
            return \vsprintf('- [%s](%s)', [
                $data[1],
                '/docs/' . \ltrim($data[2], '/'),
            ]);
        }, $content);
    }
}
