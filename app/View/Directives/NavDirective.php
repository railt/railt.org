<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\View\Directives;

use Illuminate\Routing\Router;
use Illuminate\Support\Str;

/**
 * Class NavDirective
 */
class NavDirective implements Directive
{
    private const URI_DELIMITER = '/';
    private const ROOT_URI = 'docs';

    /**
     * @var Router
     */
    private $router;

    /**
     * MenuDirective constructor.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
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
     * @param string $link
     * @param string $current
     * @return string
     * @throws \InvalidArgumentException
     * @throws \LogicException
     */
    public function render(string $link, string $current): string
    {
        $result = '';

        $paths = \iterator_to_array($this->path());
        $i     = 1;

        foreach ($paths as $uri => $title) {
            $template = $i++ === \count($paths) ? $current : $link;
            $result   .= \sprintf($template, $uri, $title);
        }

        return $result;
    }

    /**
     * @return \Generator
     * @throws \InvalidArgumentException
     * @throws \LogicException
     */
    private function path(): \Generator
    {
        $result     = '';
        $parameters = $this->router->getCurrentRoute()->parameter('page');

        if ($parameters !== null) {
            $parameters = \explode(self::URI_DELIMITER, $parameters);

            yield \route('docs') => \trans('nav.docs');

            foreach ($parameters as $depth) {
                $result .= self::URI_DELIMITER . $depth;

                yield \route('docs', [
                    'page' => \ltrim($result, self::URI_DELIMITER),
                ]) => Str::ucfirst($depth);
            }
        }
    }
}
