<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\View\Directives;

use Illuminate\Http\Request;

/**
 * Class MenuDirective
 */
class MenuDirective implements Directive
{
    private const URI_DELIMITER = '/';
    private const ROOT_URI = 'docs';

    /**
     * @var Request
     */
    private $request;

    /**
     * MenuDirective constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param string $expression
     * @return string
     */
    public function __invoke(string $expression): string
    {
        $result = '<?=app(%s::class)->render(%s)?>';

        return \sprintf($result, __CLASS__, $expression);
    }

    /**
     * @param string $nav
     * @param null|string $parent
     * @return string
     * @throws \InvalidArgumentException
     */
    public function render(string $nav, ?string $parent): string
    {
        $nav = $this->parseNav($this->request, $parent ?: $nav);

        return $nav;
    }

    /**
     * @param Request $request
     * @param string $content
     * @return string
     * @throws \InvalidArgumentException
     */
    private function parseNav(Request $request, string $content): string
    {
        $result = $content;

        foreach ($this->requestDepthNavigationParts($request) as $uri) {
            $regex = \preg_quote($uri, self::URI_DELIMITER);
            $regex = \sprintf('/href="(%s)"/isu', $regex);

            $result = \preg_replace_callback($regex, function (array $param) {
                return 'href="' . $param[1] . '" data-active="true"';
            }, $result);
        }

        return $result;
    }

    /**
     * @param Request $request
     * @return iterable
     * @throws \InvalidArgumentException
     */
    private function requestDepthNavigationParts(Request $request): iterable
    {
        $prefix = self::URI_DELIMITER . self::ROOT_URI;
        $result = '';

        $parts  = \explode(
            self::URI_DELIMITER,
            \ltrim($request->getPathInfo(), self::URI_DELIMITER)
        );

        if (\count($parts) === 1) {
            yield $prefix;
        } else {
            foreach ($parts as $part) {
                if ($part === self::ROOT_URI) {
                    continue;
                }

                if (\trim($part)) {
                    $result .= self::URI_DELIMITER . $part;
                    yield $prefix . $result;
                }
            }
        }
    }
}
