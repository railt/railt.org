<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace LanguageDetection\Store;

use App\Entity\Language;
use App\Entity\Repositories\LanguageRepository\FindableByCode;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as BaseResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

/**
 * Class CookieStore
 */
class CookieStore implements StoreInterface
{
    /**
     * @var string
     */
    private const COOKIE_LANGUAGE = 'railt_language';

    /**
     * @var FindableByCode
     */
    private $languages;

    /**
     * InteractWithCookie constructor.
     * @param FindableByCode $languages
     */
    public function __construct(FindableByCode $languages)
    {
        $this->languages = $languages;
    }

    /**
     * @param Request $request
     * @return Language|null
     */
    public function read(Request $request): ?Language
    {
        $code = $request->cookie(self::COOKIE_LANGUAGE);

        if ($this->isValidCookieValue($code)) {
            return $this->languages->findByCode($code);
        }

        return null;
    }

    /**
     * @param string|mixed $cookie
     * @return bool
     */
    private function isValidCookieValue($cookie): bool
    {
        return \is_string($cookie) && \strlen($cookie) === 2;
    }

    /**
     * @param BaseResponse $response
     * @param Language $language
     * @return BaseResponse
     */
    public function write(BaseResponse $response, Language $language): BaseResponse
    {
        switch (true) {
            case $response instanceof Response:
                return $this->withResponseCookie($response, $language);

            case $response instanceof RedirectResponse:
                return $this->withRedirectCookie($response, $language);

            case $response instanceof JsonResponse:
                return $this->withJsonResponseCookie($response, $language);

        }

        return $response;
    }

    /**
     * @param Response $response
     * @param Language $language
     * @return BaseResponse
     */
    private function withResponseCookie(Response $response, Language $language): BaseResponse
    {
        return $response->cookie(self::COOKIE_LANGUAGE, $language->getCode());
    }

    /**
     * @param JsonResponse $response
     * @param Language $language
     * @return BaseResponse
     */
    private function withJsonResponseCookie(JsonResponse $response, Language $language): BaseResponse
    {
        return $response->cookie(self::COOKIE_LANGUAGE, $language->getCode());
    }

    /**
     * @param RedirectResponse $redirect
     * @param Language $language
     * @return BaseResponse
     */
    private function withRedirectCookie(RedirectResponse $redirect, Language $language): BaseResponse
    {
        return $redirect->cookie(self::COOKIE_LANGUAGE, $language->getCode());
    }
}
