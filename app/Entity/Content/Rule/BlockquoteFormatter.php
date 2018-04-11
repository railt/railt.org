<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Content\Rule;

/**
 * Class BlockquoteFormatter
 */
class BlockquoteFormatter implements After, Before
{
    private const PATTERN_AFTER = '/<blockquote>.*?<p>(%s)(.*?)<\/p>.*?<\/blockquote>/sum';
    private const PATTERN_BEFORE = '/^(%s)>(.*?)$/sum';

    private const REPLACEMENTS = [
        0  => 'default',
        '!' => 'warn',
        '?' => 'info',
    ];

    /**
     * @param string $content
     * @return string
     */
    public function after(string $content): string
    {
        return \preg_replace_callback($this->getAfterPattern(), function (array $data) {
            [$body, $char, $content] = $data;

            $class = self::REPLACEMENTS[$char] ?? self::REPLACEMENTS[0];

            return \sprintf('<blockquote class="%s"><p>%s</p></blockquote>', $class, $content);
        }, $content) ?? $content;
    }

    /**
     * @param string $content
     * @return string
     */
    public function before(string $content): string
    {
        return \preg_replace_callback($this->getBeforePattern(), function(array $data) {
            [$body, $char, $content] = $data;

            return \sprintf('> %s %s', $char, $content);
        }, $content) ?? $content;
    }

    /**
     * @return string
     */
    private function replacementsToPattern(): string
    {
        $keys = \array_keys(self::REPLACEMENTS);
        $keys = \array_filter($keys);

        $keys = \array_map(function (string $matcher): string {
            return \preg_quote($matcher, '/');
        }, $keys);

        return \implode('|', $keys);
    }

    /**
     * @return string
     */
    private function getAfterPattern(): string
    {
        return \sprintf(self::PATTERN_AFTER, $this->replacementsToPattern());
    }

    /**
     * @return string
     */
    private function getBeforePattern(): string
    {
        return \sprintf(self::PATTERN_BEFORE, $this->replacementsToPattern());
    }
}
