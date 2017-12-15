<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Controllers\HomeController\DynamicURLResolver;
use App\Repository\ComponentsRepository as Components;
use App\Repository\ContributorsRepository as Contributors;
use App\Repository\IssuesRepository as Issues;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class HomeController
 */
class HomeController
{
    private const CONTRIBUTORS_COUNT = 9;
    private const ISSUES_COUNT = 10;

    /**
     * @param DynamicURLResolver $resolver
     * @param Request $request
     * @param string $path
     * @return RedirectResponse
     * @throws \InvalidArgumentException
     */
    public function index(DynamicURLResolver $resolver, Request $request, string $path = ''): RedirectResponse
    {
        return $resolver->redirect($request, $path);
    }

    /**
     * @param Components $components
     * @param Issues $issues
     * @param Contributors|\App\Repository\Database\Contributors $contributors
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \LogicException
     */
    public function show(Components $components, Issues $issues, Contributors $contributors): View
    {
        return \view('pages.home', [
            'issues'            => $issues->query
                ->take(self::ISSUES_COUNT)->get(),

            'components'        => $components->findAll(),

            'contributors'      => $contributors->query
                ->inRandomOrder()
                ->take(self::CONTRIBUTORS_COUNT)
                ->get(),

            'contributorsCount' => $contributors->query
                    ->count() - self::CONTRIBUTORS_COUNT,
        ]);
    }
}

