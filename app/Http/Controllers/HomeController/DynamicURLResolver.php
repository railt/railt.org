<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Controllers\HomeController;

use App\Entity\Language;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;

/**
 * Class DynamicURLResolver
 */
class DynamicURLResolver
{
    /**
     *
     */
    private const DEFAULT_ROUTE = 'home';

    /**
     *
     */
    private const DEFAULT_LANGUAGE_PARAMETER = 'lang';

    /**
     * @var Language
     */
    private $language;

    /**
     * @var Redirector
     */
    private $redirector;

    /**
     * DynamicURLResolver constructor.
     * @param Language $language
     * @param Redirector $redirector
     */
    public function __construct(Language $language, Redirector $redirector)
    {
        $this->language = $language;
        $this->redirector = $redirector;
    }

    /**
     * @param Request $request
     * @return array
     */
    private function buildParameters(Request $request): array
    {
        return \array_merge([self::DEFAULT_LANGUAGE_PARAMETER => $this->language->getCode()], $request->query->all());
    }

    /**
     * @param Request $request
     * @param string $path
     * @return RedirectResponse
     * @throws \InvalidArgumentException
     */
    public function redirect(Request $request, string $path): RedirectResponse
    {
        $redirect = $this->redirector->route(self::DEFAULT_ROUTE, $this->buildParameters($request));

        return $this->redirector->to($this->buildUri($redirect, $path, $request->query->all()));
    }


    /**
     * @param RedirectResponse $to
     * @param string $urn
     * @param array $query
     * @return string
     */
    private function buildUri(RedirectResponse $to, string $urn, array $query): string
    {
        return $to->getTargetUrl() . '/' . $urn . $this->buildQueryArgs($query);
    }


    /**
     * @param array $query
     * @return string
     */
    private function buildQueryArgs(array $query): string
    {
        return \count($query) ? '?' . \http_build_query($query) : '';
    }
}
