<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Renderer;

/**
 * Class MarkdownRenderer
 */
class MarkdownRenderer extends BaseRenderer
{
    /**
     * @var string
     */
    private const NAV_EXTRACT_REGEX = '/<h(?P<header>\d)>(?P<body>.*?)<\/h(?P=header)>/isu';

    /**
     * @var string
     */
    private const NAV_GROUP_HEADER = 'header';

    /**
     * @var string
     */
    private const NAV_GROUP_BODY = 'body';

    /**
     * @var \Parsedown
     */
    private $md;

    /**
     * MarkdownRenderer constructor.
     */
    public function __construct()
    {
        $this->md = new \Parsedown();
    }

    /**
     * @param string $content
     * @return ResultInterface
     */
    public function exec(string $content): ResultInterface
    {
        $content = $this->md->text($content);

        return new Result($content, $this->loadNavigation($content));
    }

    /**
     * @param string $content
     * @return iterable
     */
    private function loadNavigation(string $content): iterable
    {
        \preg_match_all(self::NAV_EXTRACT_REGEX, $content, $matches, \PREG_SET_ORDER);

        foreach ($matches as $result) {
            yield [$result[self::NAV_GROUP_BODY], (int)$result[self::NAV_GROUP_HEADER]];
        }
    }
}
