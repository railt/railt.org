<?php
/**
 * This file is part of railt.org package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Document;
use App\Services\Language;
use Illuminate\Http\Request;

/**
 * Class DocumentationController
 */
class DocumentationController
{
    /**
     * Page name
     */
    private const DEFAULT_PAGE = 'README';

    /**
     * @param Language $language
     * @param Request $request
     * @param null|string $page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Language $language, Request $request, ?string $page = self::DEFAULT_PAGE)
    {
        /** @var Document $document */
        $document = Document::query()
            ->where('lang', $language->get())
            ->where('uri', $page)
            ->first();

        return \view('pages.docs', [
            'content'   => $document,
            'nav'       => $document ? $document->nav() : null,
            'childNav'  => $document ? $document->childNav() : null,
            'parentNav' => $document ? $document->parentNav() : null,

            'renderActiveLink' => function (string $content) use ($request): string {
                $regex = \preg_quote($request->getPathInfo(), '/');
                $regex = \sprintf('/href="(%s)"/isu', $regex);

                return \preg_replace_callback($regex, function (array $param) {
                    return 'href="' . $param[1] . '" data-active="true"';
                }, $content);

                return $content;
            },
        ]);
    }
}
