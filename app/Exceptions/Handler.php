<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Class Handler
 */
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        NotFoundHttpException::class,
        AccessDeniedHttpException::class,
    ];

    /**
     * @var array
     */
    protected $forceReport = [
        HttpException::class,
        HttpResponseException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param \Exception $exception
     * @return void
     */
    public function report(\Exception $exception)
    {
        if ($this->container->bound('sentry') && $this->shouldReport($exception)) {
            /** @var \Raven_Client $sentry */
            $sentry = $this->container->make('sentry');

            $sentry->captureException($exception);
        }

        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Exception $exception
     * @return string
     * @throws \InvalidArgumentException
     */
    public function render($request, \Exception $exception)
    {
        //
        // Is Debug
        //
        if (\env('APP_ENV') === 'local' || (bool)\config('app.debug')) {
            return $request->expectsJson()
                ? parent::render($request, $exception)
                : parent::convertExceptionToResponse($exception);
        }

        //
        // Otherwise
        //
        $code = $this->getExceptionCode($exception);

        return \response()->view('page.error', [
            'title'       => $this->getExceptionTitle($exception),
            'code'        => $code,
            'description' => $this->getExceptionDescription($exception),
        ], $code);
    }

    /**
     * @param \Throwable $error
     * @return int
     */
    private function getExceptionCode(\Throwable $error): int
    {
        return $error instanceof HttpException ? $error->getStatusCode() : 500;
    }

    /**
     * @param \Throwable $error
     * @return string
     */
    private function getExceptionTitle(\Throwable $error): string
    {
        $title = \class_basename($error);
        $title = \str_replace_last('HttpException', '', $title);

        return \ucwords(\snake_case($title, ' '));
    }

    /**
     * @param \Throwable $error
     * @return string
     */
    private function getExceptionDescription(\Throwable $error): string
    {
        if ($error instanceof HttpException) {
            if ($error->getMessage()) {
                return $error->getMessage();
            }

            switch ($error->getStatusCode()) {
                case 403:
                    return 'Sorry, you are not authorized to access this page.';
                case 404:
                    return 'Sorry, the page you are looking for could not be found.';
                case 419:
                    return 'Sorry, your session has expired. Please refresh and try again.';
                case 429:
                    return 'Sorry, you are making too many requests to our servers.';
                case 500:
                    return 'Whoops, something went wrong on our servers.';
                case 503:
                    return 'Sorry, we are doing some maintenance. Please check back soon.';
            }
        }

        return 'Whoops, something went wrong';
    }

    /**
     * Determine if the exception is in the "do not report" list.
     *
     * @param  \Exception $e
     * @return bool
     */
    protected function shouldntReport(\Exception $e): bool
    {
        $internal = \array_filter($this->internalDontReport, function (string $class) {
            return ! \in_array($class, $this->forceReport, true);
        });

        $dontReport = \array_merge($this->dontReport, $internal);

        $filter = function ($type) use ($e) {
            return $e instanceof $type;
        };

        return \array_first($dontReport, $filter) !== null;
    }

}
