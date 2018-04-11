<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Entity\Content\Rule;

use Illuminate\Support\Str;

/**
 * Class HeadersAnchors
 */
class HeadersAnchors implements After
{
    private const PATTERN    = '/<h(\d+)>(.*?)<\/h\d+>/isum';
    private const REPLACE_TO = '<h%d id="%s">%s</h%1$d>';

    private const DIGIT_MAPPINGS = [
        0 => 'zero',
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
    ];

    /**
     * @param string $content
     * @return string
     */
    public function after(string $content): string
    {
        return \preg_replace_callback(self::PATTERN, function (array $data): string {
            [$data, $heading, $title] = $data;

            $slug = $this->titleToAnchor($title);

            return \sprintf(self::REPLACE_TO, $heading, $slug, $title);
        }, $content) ?? $content;
    }

    /**
     * @param string $title
     * @return string
     */
    private function titleToAnchor(string $title): string
    {
        $slug = $this->toSlug($title);

        $slug = \preg_replace('/\-+/', '-', $slug);

        return $slug;
    }

    /**
     * @param string $title
     * @return string
     */
    private function toSlug(string $title): string
    {
        $slug = Str::slug(\trim(\strip_tags($title)));

        if (! $slug) {
            return 'h' . Str::random(7);
        }

        switch (true) {
            case $this->startsWithAlpha($slug):
                return $slug;
            case $this->startsWithDigit($slug):
                return (self::DIGIT_MAPPINGS[(int)$slug[0]] ?? '_')
                    . '-' . Str::substr($slug, 1);
        }

        return '_' . $slug;
    }

    /**
     * @param string $slug
     * @return bool
     */
    private function startsWithAlpha(string $slug): bool
    {
        return \ctype_alpha($slug[0]);
    }

    /**
     * @param string $slug
     * @return bool
     */
    private function startsWithDigit(string $slug): bool
    {
        return \ctype_digit($slug[0]);
    }
}
