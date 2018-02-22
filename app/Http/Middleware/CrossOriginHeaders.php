<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class CrossOriginHeaders
{
    /**
     * @param Request $request
     * @param \Closure $next
     * @return Response|array|JsonResponse
     * @throws \InvalidArgumentException
     */
    public function handle(Request $request, \Closure $next): SymfonyResponse
    {
        if ($request->getMethod() === 'OPTIONS') {
            return $this->wrap(new Response('', Response::HTTP_OK));
        }

        return $this->wrap($next($request));
    }

    /**
     * @param SymfonyResponse $response
     * @return SymfonyResponse
     */
    private function wrap(SymfonyResponse $response): SymfonyResponse
    {
        $response->headers->add([
            'Access-Control-Allow-Origin'    => '*',
            'Access-Control-Request-Method'  => 'POST,GET,OPTIONS',
            'Server'                         => 'Railt GraphQL',
            'Vary'                           => 'Accept-Encoding,Origin',
            'Access-Control-Request-Headers' => \implode(',', [
                'Accept',
                'Content-Type',
                'Authorization',
                'Accept-Language',
                'Accept-Encoding',
                'Accept-Charset',
                'Connection',
                'User-Agent',
                'Host',
                'Referer',
                'Origin',
                'Pragma',
                'Cache-Control',
            ]),
        ]);

        return $response;
    }
}
