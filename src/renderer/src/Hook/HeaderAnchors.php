<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Renderer\Hook;

/**
 * Class HeaderAnchors
 */
class HeaderAnchors extends BaseHook
{

    /**
     * @var string
     */
    private const NAV_EXTRACT_REGEX = '/<h(?P<header>\d)>(?P<body>.*?)<\/h(?P=header)>/isu';

    /**
     * @param string $rendered
     * @return string
     */
    public function after(string $rendered): string
    {
        return \preg_replace_callback(self::NAV_EXTRACT_REGEX, function (array $matches) {
            ['header' => $header, 'body' => $body] = $matches;

            return \vsprintf('<h%d><a href="#%s" name="%2$s" id="%2$s"></a>%s</h%1$d>', [
                $header,
                $this->getAnchor($body),
                $body
            ]);
        }, $rendered);
    }

    /**
     * @param string $body
     * @return string
     */
    private function getAnchor(string $body): string
    {
        return \str_slug(\strip_tags($body));
    }
}
