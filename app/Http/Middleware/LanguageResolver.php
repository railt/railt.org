<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Middleware;

use App\Entity\Language;
use App\Repository\LanguagesRepository;
use Illuminate\Container\Container;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class LanguageResolver
 */
class LanguageResolver
{
    /**
     * @var LanguagesRepository
     */
    private $languages;

    /**
     * @var string
     */
    private $defaultCode;

    /**
     * @var Container
     */
    private $app;

    /**
     * LanguageResolver constructor.
     * @param Container $app
     * @param LanguagesRepository $languages
     * @param Repository $config
     */
    public function __construct(Container $app, LanguagesRepository $languages, Repository $config)
    {
        $this->app = $app;
        $this->languages = $languages;
        $this->defaultCode = $config->get('app.locale');
    }

    /**
     * @param Request $request
     * @param \Closure $then
     * @return Response
     * @throws \LogicException
     */
    public function handle(Request $request, \Closure $then): Response
    {
        $this->app->singleton(Language::class, function() use ($request) {
            $lang = $this->getCurrentLanguage($request);

            $this->app->setLocale($lang->getCode());

            return $lang;

        });

        return $then($request);
    }

    /**
     * @return \App\Entity\Language
     * @throws \LogicException
     */
    private function getDefaultLanguage(): Language
    {
        return $this->languages->findDefault();
    }

    /**
     * @param Request $request
     * @return Language
     * @throws \LogicException
     */
    private function getCurrentLanguage(Request $request): Language
    {
        if ($request->route()) {
            $parameter = $request->route()->parameter('lang', $this->defaultCode);

            return $this->languages->findOneByCode($parameter) ?? $this->getDefaultLanguage();
        }

        return $this->getDefaultLanguage();
    }
}
