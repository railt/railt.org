<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\GraphQL\Extensions\Exception;

use Railt\Foundation\Extensions\BaseExtension;
use Railt\Http\RequestInterface;
use Railt\Http\ResponseInterface;

/**
 * Class ExceptionReporter
 */
class ExceptionReporter extends BaseExtension
{
    /**
     * @param RequestInterface $request
     * @param \Closure $then
     * @return ResponseInterface
     */
    public function handle(RequestInterface $request, \Closure $then): ResponseInterface
    {
        $response = parent::handle($request, $then);

        $this->captureExceptions($response);

        return $response;
    }

    /**
     * @param ResponseInterface $response
     */
    private function captureExceptions(ResponseInterface $response): void
    {
        $sentry = $this->make('sentry');

        foreach ($response->getExceptions() as $exception) {
            $sentry->captureException($exception);
        }
    }
}
