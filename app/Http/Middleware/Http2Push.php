<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class Http2Push
 */
class Http2Push
{
    /**
     * @param Request $request
     * @param \Closure $then
     * @param string ...$links
     * @return mixed
     * @throws \Exception
     */
    public function handle(Request $request, \Closure $then, string ...$links)
    {
        $response = $then($request);

        if ($response instanceof Response) {
            $this->inject($response, $links);
        }

        return $response;
    }

    /**
     * @param Response $response
     * @param array $links
     * @throws \Exception
     */
    private function inject(Response $response, array $links): void
    {
        $headers = [];

        foreach ($links as $link) {
            $headers[] = '<' . (string)\mix($link) . '>; rel=preload; ' . $this->as($link);
        }

        $response->headers->set('link', $headers);
    }

    /**
     * @param string $path
     * @return string
     */
    private function as(string $path): string
    {
        switch (true) {
            case Str::endsWith($path, '.css'):
                return 'as=style';
            case Str::endsWith($path, '.js'):
                return 'as=script';
            case Str::endsWith($path, ['.ogv', '.mp4', '.mpeg', '.webm']):
                return 'as=video';
            case Str::endsWith($path, ['.eot', '.woff2', '.woff', '.ttf']):
                return 'as=font';
            case Str::endsWith($path, ['.png', '.gif', '.jpg', '.wbmp']):
                return 'as=image';
        }

        return '';
    }
}
