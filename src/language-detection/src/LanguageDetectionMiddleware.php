<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace LanguageDetection;

use App\Entity\Language;
use Carbon\Carbon;
use Illuminate\Contracts\Container\Container;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use LanguageDetection\Detector\DetectorInterface;
use LanguageDetection\Store\StoreInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class LanguageDetectionMiddleware
 */
class LanguageDetectionMiddleware
{
    /**
     * @var StoreInterface
     */
    private $store;

    /**
     * @var DetectorInterface
     */
    private $detector;

    /**
     * @var Container
     */
    private $container;

    /**
     * LanguageDetectionMiddleware constructor.
     * @param StoreInterface $store
     * @param DetectorInterface $detector
     * @param Container $container
     */
    public function __construct(StoreInterface $store, DetectorInterface $detector, Container $container)
    {
        $this->store = $store;
        $this->detector = $detector;
        $this->container = $container;
    }

    /**
     * @param Request $request
     * @param \Closure $next
     * @return Response
     * @throws HttpException
     */
    public function handle(Request $request, \Closure $next): Response
    {
        $this->setLanguage($language = $this->read($request));

        $response = $this->redirectToDomain($request, $language, function($request) use ($next) {
            return $next($request);
        });

        $this->store->write($response, $this->container->make(Language::class));

        return $response;
    }

    /**
     * @param Request $request
     * @param Language $language
     * @param \Closure $otherwise
     * @return Response
     * @throws \InvalidArgumentException
     */
    private function redirectToDomain(Request $request, Language $language, \Closure $otherwise): Response
    {
        if (Str::startsWith($request->getHost(), $language->getCode())) {
            return $otherwise($request);
        }

        $url = \vsprintf('//%s.%s%s', [
            $language->getCode(),
            \basename(\config('app.url')),
            $request->getRequestUri()
        ]);

        return new RedirectResponse($url);
    }

    /**
     * @param Language $language
     */
    private function setLanguage(Language $language): void
    {
        Carbon::setLocale($language->getCode());
        Lang::setLocale($language->getCode());
    }

    /**
     * @param Request $request
     * @return Language
     * @throws HttpException
     */
    private function read(Request $request): Language
    {
        $language = $this->store->read($request) ?? $this->detector->detect($request);

        if ($language === null) {
            $this->throwLanguageError();
        }

        $this->container->instance(Language::class, $language);

        return $language;
    }

    /**
     * @throws HttpException
     */
    private function throwLanguageError(): void
    {
        $error = 'Could not extract language information';
        throw new HttpException(Response::HTTP_INTERNAL_SERVER_ERROR, $error);
    }
}
